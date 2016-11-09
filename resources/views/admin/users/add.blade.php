@extends('admin.layouts.adminMaster')

@section('title')
	Add Users
@endsection

@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>Add User</h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="{{ route('users') }}">Users and Members</a></li>
	    <li><a href="{{ route('add.user') }}">Add User</a></li>
	  </ol>
	</section>
		@include('includes.infoBox')
	<section class="content">
	 	<div class="row">
	 	  	<div class="col-xs-12">
		          <div class="box">
		             <div class="box-header">
		               <h3 class="box-title">Add New user</h3>
		             </div>
		             <!-- /.box-header -->
					   	@include('admin.users.form')	
				   </div>
			    </div>
	    		</div>
    		</div>
	</section>

@endsection
