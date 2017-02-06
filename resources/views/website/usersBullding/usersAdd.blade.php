@extends('layouts.app')

@section('title')
     Add New Bullding
@endsection

@section('styles')
     {!! Html::style('src/global/select2.min.css') !!}
     {!! Html::style('src/global/bulldingAll.css') !!}
@endsection

@section('content')
     <div class="container">
          <div class="row profile">
               @include('website.bullding.page')
               <div class="col-md-9">
                    <ol class="breadcrumb" style="margin-bottom: 5px; background-color: #fff;">
                         <li><a href="{{ url('/') }}">Home</a></li>
                         <li><a href="{{ route('users.create.bullding') }}">Add New Bullding</a></li>
                    </ol>
                    <div class="profile-content">
                         @include('website.usersBullding.form')
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
