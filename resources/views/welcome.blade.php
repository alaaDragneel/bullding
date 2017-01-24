@extends('layouts.app')

@section('title')
     Welcome
@endsection
@section('styles')
     {!! Html::style('src/global/select2.min.css') !!}
     <style>
     hr {
          margin: 10px 0;
     }
     p.text-justify {
          padding-bottom: 10px;
          margin-bottom: 10px;
     }
     </style>
     <link rel="stylesheet" href="{{ asset('src/global/css/reset.css') }}"> <!-- Resource style -->
     <link rel="stylesheet" href="{{ asset('src/global/css/style.css') }}"> <!-- Resource style -->
	<script src="{{ asset('src/global/js/modernizr.js') }}"></script> <!-- Modernizr -->
@endsection

@section('content')
     <div class="banner text-center" style="background: url({{ getSetting('mainSlider') }}); background-size: cover; background-attachment: fixed;">
       <div class="container">
         <div class="banner-info">
           <h1>Welcome To the Biggest {{ getSetting() }}</h1>
           <p>
                <!-- Advanced Search -->
                {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                <div class="row">
                     <div class="col-lg-3">
                          {!! Form::text("price_from", null, ['class' => 'form-control', 'placeholder' => 'Bulding Price from...']) !!}
                     </div>
                     <div class="col-lg-3">
                          {!! Form::text("price_to", null, ['class' => 'form-control', 'placeholder' => 'Bulding Price to...']) !!}
                     </div>
                     <div class="col-lg-3">
                          {!! Form::select("place", place(), null, ['class' => 'form-control', 'placeholder' => 'Rooms place']) !!}
                     </div>
                     <div class="col-lg-3">
                          {!! Form::select("rooms", roomsNu(), null, ['class' => 'form-control', 'placeholder' => 'Rooms numbers']) !!}
                     </div>
                </div>
                <br>
                <div class="row">
                     <div class="col-lg-3">
                          {!! Form::select("type", type(), null, ['class' => 'form-control', 'placeholder' => 'Bullding Type']) !!}
                     </div>
                     <div class="col-lg-3">
                          {!! Form::select("rent", rent(), null, ['class' => 'form-control', 'placeholder' => 'Bullding rent OR Buy']) !!}
                     </div>
                     <div class="col-lg-3">
                          {!! Form::text("square", null, ['class' => 'form-control', 'placeholder' => 'Bulding square...']) !!}
                     </div>
                     <div class="col-lg-3">
                          {!! Form::submit("search", ['class' => 'btn btn-primary btn-block']) !!}
                     </div>
                </div>

                     {!! Form::close() !!}
                <!-- Advanced Search -->
           </p>
           <a class="btn btn-success" href="{{ route('show.all.bullding') }}">See More</a> </div>
       </div>
     </div>
     <div class="main">
          <ul class="cd-items cd-container">
               @foreach (\App\Bullding::where('status', '1')->get() as $bullding)
                    <li class="cd-item">
                         <img src="{{ asset(checkImage($bullding->image)) }}"
                         width="257"
                         height="280"
                         alt="Bullding {{ $bullding->name }} Preview"
                         title="Bullding {{ $bullding->name }} Preview"/>

                         <a href="#0"
                         class="cd-trigger" data-id="{{ $bullding->id }}"
                         title="Bullding {{ $bullding->name }} Preview">Quick View</a>
                    </li> <!-- cd-item -->
               @endforeach
          </ul> <!-- cd-items -->

          <div class="cd-quick-view">
               <div class="cd-slider-wrapper">
                    <ul class="cd-slider">
                         <li><img src="{{ asset('src/images/item-1.jpg') }}" class="imgBox" alt="Product 1"></li>
                    </ul> <!-- cd-slider -->
               </div> <!-- cd-slider-wrapper -->

               <div class="cd-item-info">
                    <h2 class="title"></h2>
                    <p class="disBox"></p>

                    <ul class="cd-item-action">
                         <li><a href="#0" class="add-to-cart priceBox">Information</a></li>
                         <li><a href="#0" class="moreBox">Learn more</a></li>
                    </ul> <!-- cd-item-action -->
               </div> <!-- cd-item-info -->
               <a href="#0" class="cd-close">Close</a>
          </div> <!-- cd-quick-view -->
     </div>
@endsection
@section('footer')
     {!! Html::script('src/global/js/velocity.min.js') !!}
     {!! Html::script('src/global/select2.min.js') !!}
     <script type="text/javascript">
     $('select[name=place], select[name=rooms]').select2();
     // return the root link
     function urlHome(root = 0)
     {
          if (root == 0) {
               return '{{ route('show.ajax.bullding') }}';
          } else {
               return '{{ Request::root() }}';
          }
     }

     function publicHome(image)
     {
          return image !== '' ? image : '{{ avatar() }}';
     }

     </script>

     {!! Html::script('src/global/js/main.js') !!}
@endsection
