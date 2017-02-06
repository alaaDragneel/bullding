@extends('layouts.app')

@section('title')
     the bullding addedd Successfully
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
                         <li><a href="{{ route('users.create.bullding') }}">Add New Bullding</a></li>
                         <li class="active"><a href="#">bullding addedd Successfully</a></li>
                    </ol>
                    <div class="profile-content">
                         <div class="alert alert-success">
                              <b> bullding </b>
                              addedd Successfully
                         </div>
                    </div>
               </div>
          </div>
     </div>
@endsection
