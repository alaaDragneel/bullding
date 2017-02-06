@extends('layouts.app')

@section('title')
     My Bullding
@endsection

@section('styles')
     {!! Html::style('src/global/bulldingAll.css') !!}
@endsection

@section('content')
     <div class="container">
          <div class="row profile">
               @include('website.bullding.page')
               <div class="col-md-9">
                    <ol class="breadcrumb" style="margin-bottom: 5px; background-color: #fff;">
                         <li><a href="{{ url('/') }}">Home</a></li>
                         <li><a href="{{ route('show.all.bullding') }}">All Building</a></li>
                         <li class="active"><a href="#">My Building</a></li>
                    </ol>
                    <div class="profile-content">
                         @include('website.bullding.sharefile', ['bulldings' => $bulldingAll])
                         <div class="pagination col-md-6 col-md-offset-3">
                              {{ $bulldingAll->appends(Request::query())->render() }}
                         </div>
                    </div>
               </div>
          </div>
     </div>
@endsection

@section('footer')
     {!! Html::script('src/global/select2.min.js') !!}
     <script type="text/javascript">
          $('select[name=place]').select2();
     </script>
@endsection
