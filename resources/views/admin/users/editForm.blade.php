{!! Form::model($user, ['method' => 'PATCH', 'route' => ['update.user', $user->id], 'class' => 'form-horizontal' ]) !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  <label for="name" class="col-md-4 control-label">Name</label>
  <div class="col-md-6">
       {!! Form::text('name', isset($user) ? $user->name  : old('name'), ['id'=>'name', 'class'=>'form-control']) !!}

       @if ($errors->has('name'))
          <span class="help-block">
               <strong>{{ $errors->first('name') }}</strong>
          </span>
       @endif
  </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
  <label for="email" class="col-md-4 control-label">E-Mail Address</label>

  <div class="col-md-6">
       {!! Form::email('email', isset($user) ? $user->email  : old('email'), ['id' => 'email', 'class' => 'form-control']) !!}

       @if ($errors->has('email'))
          <span class="help-block">
               <strong>{{ $errors->first('email') }}</strong>
          </span>
       @endif
  </div>
</div>

<div class="form-group">
  <label for="type" class="col-md-4 control-label">type</label>

  <div class="col-md-6">
       {!! Form::select('userType', ['0' => 'user', '1' => 'Admin'], null,['class' => 'form-control', 'id' => 'type']) !!}
     </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

  {!! Form::label('password', 'password', ['class' => 'col-md-4 control-label']) !!}

  <div class="col-md-6">

       {!! Form::password('password', ['id'=>'password', 'class'=>'form-control']) !!}

       @if ($errors->has('password'))
          <span class="help-block">
               <strong>{{ $errors->first('password') }}</strong>
          </span>
       @endif
  </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

       {!! Form::label('password-confirm', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}

  <div class="col-md-6">

       {!! Form::password('password_confirmation', ['id'=>'password-confirm', 'class'=>'form-control']) !!}

       @if ($errors->has('password_confirmation'))
          <span class="help-block">
               <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
       @endif
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
       <button type="submit" class="btn btn-info">
          <i class="fa fa-btn fa-edit"></i> Edit
       </button>
       @if ($user->id !== 1)
            <a href="{{ route('delete.user', ['user_id' => $user->id]) }}" class="btn btn-danger">
                 <i class="fa fa-close"></i> Delete</a>
       @endif
  </div>
</div>

{!! Form::close() !!}
