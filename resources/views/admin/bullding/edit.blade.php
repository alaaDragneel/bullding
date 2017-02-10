@extends('admin.layouts.adminMaster')

@section('title')
     Edit Bullding {{ $bullding->name }}
@endsection

@section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Edit bullding {{ $bullding->name }}</h1>
          <ol class="breadcrumb">
               <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a href="{{ route('admin.bulldings.index') }}">Bullding</a></li>
               <li><a href="{{ route('admin.bulldings.edit', ['id' => $bullding->id]) }}">Edit Bullding {{ $bullding->name }}</a></li>
          </ol>
     </section>
     <section class="content">
          <div class="row">
               <div class="col-xs-12">
                    <div class="box">
                         <div class="box-header">
                              <h3 class="box-title">Edit Bullding {{ $bullding->name }}</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">

                              <div class="form-group">
                                   <label for="name" class="col-md-4 control-label">Information About the Bullding User</label>
                                   <div class="col-md-6">
                                        <p>User Name: {{ $user->name }}</p>
                                        <p>User Email: {{ $user->email }}</p>
                                        <p>User Permition: {{ userType($user->userType) }}</p>
                                        <p>More information: <a href="{{ route('edit.user', ['user_id' => $user->id]) }}">Visit the Profile</a></p>
                                   </div>
                              </div>

                              {!! Form::model($bullding, ['method' => 'PATCH', 'route' => ['admin.bulldings.update', $bullding->id], 'class' => 'form-horizontal', 'files' => 'true']) !!}

                              @include('admin.bullding.editForm')

                              {!! Form::close() !!}

                              </div>
                         </div>
                    </div>
               </div>
          </section>

     @endsection
