@extends('layouts.app')

@section('title')
     {{ $messageTitle }}
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
                         <li><a href="{{ route('show.all.bullding') }}">Show All Bullding</a></li>
                         <li><a href="{{ route('show.single.bullding', ['id' => $bulldingInfo->id]) }}">{{ $bulldingInfo->name }}</a></li>
                    </ol>
                    <div class="profile-content">
                         <div class="alert alert-danger">
                              <b>Warning</b> 
                              {{ $messageBody }}
                         </div>
                    </div>
               </div>
          </div>
     </div>
@endsection
