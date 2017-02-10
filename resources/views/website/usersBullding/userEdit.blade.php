@extends('layouts.app')

@section('title')
     Edit Bullding {{ $bulldingInfo->name }}
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
                         <li><a href="{{ route('user.show.bullding.unappreved') }}">My unappreved Bullding</a></li>
                         <li><a href="{{  route('user.edit.bullding.unappreved', ['id' => $bulldingInfo->id]) }}">Edit Bullding {{ $bulldingInfo->name }}</a></li>
                    </ol>
                    <div class="profile-content">
                         @include('website.usersBullding.editBullding')
                    </div>
               </div>
          </div>
     </div>
@endsection
