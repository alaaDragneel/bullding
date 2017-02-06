@extends('layouts.app')

@section('title')
     Edit the Personal information For {{ $user->name }}
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
                         <li class="active"><a href="#">Edit the Personal information For {{ $user->name }}</a></li>
                    </ol>
                    <div class="profile-content">
                         @include('website.profile.editForm', ['user' => $user])
                    </div>
                    </div>
               </div>
          </div>
     </div>
@endsection
