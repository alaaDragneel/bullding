@extends('admin.layouts.adminMaster')

@section('title')
	Add New Bullding
@endsection

@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>Add New Bullding</h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="{{ route('admin.bulldings.index') }}">Bullding</a></li>
	    <li><a href="{{ route('admin.bulldings.create') }}">Add New Bullding</a></li>
	  </ol>
	</section>
	<section class="content">
	 	<div class="row">
	 	  	<div class="col-xs-12">
		          <div class="box">
		             <div class="box-header">
		               <h3 class="box-title">Add New Bullding</h3>
		             </div>
		             <!-- /.box-header -->
                              {!! Form::open(['method' => 'post', 'route' => 'admin.bulldings.store', 'class' => 'form-horizontal', 'files' => 'true']) !!}

                              @include('admin.bullding.form')

                              {!! Form::close() !!}
				   </div>
			    </div>
	    		</div>
    		</div>
	</section>

@endsection
