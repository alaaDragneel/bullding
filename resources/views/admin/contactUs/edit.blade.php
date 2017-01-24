@extends('admin.layouts.adminMaster')

@section('title')
	Edit Message {{ $contactUs->contactName }}
@endsection

@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>Edit Message {{ $contactUs->contactName }}</h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="{{ route('admin.contacts.index') }}">Contact Message</a></li>
	    <li><a href="{{ route('admin.contacts.edit', ['id' => $contactUs->id]) }}">Edit Message {{ $contactUs->contactName }}</a></li>
	  </ol>
	</section>
	<section class="content">
	 	<div class="row">
	 	  	<div class="col-xs-12">
		          <div class="box">
		             <div class="box-header">
		               <h3 class="box-title">Edit Message {{ $contactUs->contactName }}</h3>
		             </div>
		             <!-- /.box-header -->
		             <div class="box-body">
						{!! Form::model($contactUs,
                                   [
                                        'method' => 'PATCH', 'route' => ['admin.contacts.update', $contactUs->id],
                                        'class' => 'form-horizontal'
                                    ]) !!}
                              @include('admin.contactUs.form')
					    {!! Form::close() !!}

				   </div>
			    </div>
	    		</div>
    		</div>
	</section>

@endsection
