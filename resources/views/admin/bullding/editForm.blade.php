<div class="panel panel-primary">
	<div class="panel-heading">Edit {{ $user->name }}</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="POST" action="{{ route('update.user', ['user_id' => $user->id]) }}">
	         {{ csrf_field() }}
	         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	             <label for="name" class="col-md-4 control-label">Name</label>

	             <div class="col-md-6">
	                 <input id="name" type="text" class="form-control" name="name" value="{{ isset($user) ? $user->name  : old('name') }}">

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
	                 <input id="email" type="email" class="form-control" name="email" value="{{ isset($user) ? $user->email  : old('email') }}">

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
	               <select class="form-control" name="userType">
					<option value="0"
						@if ($user->userType === 0)
							selected
						@endif>User
					</option>
					<option value="1"
					@if ($user->userType === 1)
						selected
					@endif>Admin
				</option>
	               </select>

	               </div>
	         </div>

	         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	             <label for="password" class="col-md-4 control-label">Password</label>

	             <div class="col-md-6">
	                 <input id="password" type="password" class="form-control" name="password" placeholder="Write Your New Password">

	                 @if ($errors->has('password'))
	                     <span class="help-block">
	                         <strong>{{ $errors->first('password') }}</strong>
	                     </span>
	                 @endif
	             </div>
	         </div>

	         <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	             <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

	             <div class="col-md-6">
	                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

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
	             </div>
	         </div>
	    </form>
    </div>
</div>
