@extends('layouts.app')

@section('title')
     This Bullding Waiting Admin Permetion
@endsection

@section('styles')
     {!! Html::style('src/global/bulldingAll.css') !!}
     {!! Html::style('src/global/select2.min.css') !!}
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
                              <b>Warning</b> Building {{ $bulldingInfo->name }} Is Found But Waiting Admin Permetion This Building Will Publish In Maximum 24 Hours
                         </div>
                    </div>
               </div>
          </div>
     </div>
@endsection
