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
                              {{-- @include('admin.users.editForm') --}}

                              {!! Form::model($bullding, ['method' => 'PATCH', 'route' => ['admin.bulldings.update', $bullding->id], 'class' => 'form-horizontal' ]) !!}

                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                   <label for="name" class="col-md-4 control-label">Name</label>
                                   <div class="col-md-6">
                                        {!! Form::text('name', isset($bullding) ? $bullding->name  : old('name'), ['id'=>'name', 'class'=>'form-control']) !!}

                                        @if ($errors->has('name'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_rooms --}}
                              <div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
                                   <label for="rooms" class="col-md-4 control-label">bullding rooms</label>

                                   <div class="col-md-6">
                                        {!! Form::text('rooms', isset($bullding) ? $bullding->rooms  : old('rooms'), ['id'=>'rooms', 'class'=>'form-control']) !!}
                                        @if ($errors->has('rooms'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('rooms') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_price --}}
                              <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                   <label for="price" class="col-md-4 control-label">bullding price</label>

                                   <div class="col-md-6">
                                        {!! Form::text('price', isset($bullding) ? $bullding->price  : old('price'), ['id'=>'price', 'class'=>'form-control']) !!}

                                        @if ($errors->has('price'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('price') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_rent --}}
                              <div class="form-group{{ $errors->has('rent') ? ' has-error' : '' }}">
                                   <label for="rent" class="col-md-4 control-label">bullding rent</label>

                                   <div class="col-md-6">
                                        {!! Form::select('rent', rent(), null, ['class' => 'form-control', 'id' => 'rent']); !!}
                                        @if ($errors->has('rent'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('rent') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_square --}}
                              <div class="form-group{{ $errors->has('square') ? ' has-error' : '' }}">
                                   <label for="square" class="col-md-4 control-label">bullding square</label>

                                   <div class="col-md-6">
                                        {!! Form::text('square', isset($bullding) ? $bullding->square  : old('square'), ['id'=>'square', 'class'=>'form-control']) !!}

                                        @if ($errors->has('square'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('square') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_type --}}
                              <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                   <label for="type" class="col-md-4 control-label">bullding type</label>

                                   <div class="col-md-6">
                                        {!! Form::select('type', type(), null, ['class' => 'form-control', 'id' => 'type']); !!}
                                        @if ($errors->has('type'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('type') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_status --}}
                              <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                   <label for="status" class="col-md-4 control-label">bullding status</label>

                                   <div class="col-md-6">
                                        {!! Form::select('status', status(), null, ['class' => 'form-control', 'id' => 'status']); !!}
                                        @if ($errors->has('status'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('status') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_meta --}}
                              <div class="form-group{{ $errors->has('meta') ? ' has-error' : '' }}">
                                   <label for="meta" class="col-md-4 control-label">bullding meta</label>

                                   <div class="col-md-6">
                                        {!! Form::text('meta', isset($bullding) ? $bullding->meta  : old('meta'), ['id'=>'meta', 'class'=>'form-control']) !!}

                                        @if ($errors->has('meta'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('meta') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_small_disc --}}
                              <div class="form-group{{ $errors->has('small_dis') ? ' has-error' : '' }}">
                                   <label for="small_dis" class="col-md-4 control-label">bullding  search engins discription</label>

                                   <div class="col-md-6">
                                        {!! Form::textarea('small_dis', isset($bullding) ? $bullding->small_dis  : old('small_dis'), ['id'=>'small_dis', 'class'=>'form-control', 'rows' => '4']) !!}

                                        @if ($errors->has('small_dis'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('small_dis') }}</strong>
                                             </span>
                                        @endif
                                        <br>
                                        <div class="alert alert-warning">Cannot enter more Than 160 Characters by google calibration</div>
                                   </div>
                              </div>
                              {{-- bullding_langtuide --}}
                              <div class="form-group{{ $errors->has('langtuide') ? ' has-error' : '' }}">
                                   <label for="langtuide" class="col-md-4 control-label">bullding langtuide</label>

                                   <div class="col-md-6">
                                        {!! Form::text('langtuide', isset($bullding) ? $bullding->langtuide  : old('langtuide'), ['id'=>'langtuide', 'class'=>'form-control']) !!}

                                        @if ($errors->has('langtuide'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('langtuide') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_latitiute --}}
                              <div class="form-group{{ $errors->has('latitiute') ? ' has-error' : '' }}">
                                   <label for="latitiute" class="col-md-4 control-label">bullding latitiute</label>

                                   <div class="col-md-6">
                                        {!! Form::text('latitiute', isset($bullding) ? $bullding->latitiute  : old('latitiute'), ['id'=>'latitiute', 'class'=>'form-control']) !!}

                                        @if ($errors->has('latitiute'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('latitiute') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>
                              {{-- bullding_large_disc --}}
                              <div class="form-group{{ $errors->has('decription') ? ' has-error' : '' }}">
                                   <label for="decription" class="col-md-4 control-label">bullding  decription</label>

                                   <div class="col-md-6">
                                        {!! Form::textarea('decription', isset($bullding) ? $bullding->decription  : old('decription'), ['id'=>'decription', 'class'=>'form-control', 'rows' => '5']) !!}

                                        @if ($errors->has('decription'))
                                             <span class="help-block">
                                                  <strong>{{ $errors->first('decription') }}</strong>
                                             </span>
                                        @endif
                                   </div>
                              </div>

                              <div class="form-group">
                                   <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-info">
                                             <i class="fa fa-btn fa-edit"></i> update
                                        </button>
                                        <a href="{{ route('admin.bulldings.destroy', ['id' => $bullding->id]) }}" class="btn btn-danger">
                                             <i class="fa fa-close"></i> Delete</a>
                                        </div>
                                   </div>

                                   {!! Form::close() !!}

                              </div>
                         </div>
                    </div>
               </div>
          </section>

     @endsection
