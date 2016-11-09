@extends('admin.layouts.adminMaster')
@section('title')
	Site Setting
@endsection
@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>edit Site Setting</h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="{{ route('siteSetting') }}">edit Site Setting</a></li>
	  </ol>
	</section>
		@include('includes.infoBox')
	<section class="content">
	 	<div class="row">
	 	  	<div class="col-xs-12">
		          <div class="box">
		             <div class="box-header">
		               <h3 class="box-title">edit Site Setting</h3>
		             </div>
				   	<form action="{{route('siteSetting.update')}}" method="post">
						{{ csrf_field() }}
		            		@foreach ($siteSetting as $site)
							<div class="form-group{{ $errors->has($site->nameSetting) ? ' has-error' : '' }}">
				 	             <label for="{{ $site->nameSetting }}" class="col-md-4 control-label">{{ $site->slug }}</label>
				 	             <div class="col-md-9">
								   @if ($site->type == 0)
									   <input id="{{ $site->nameSetting }}" type="text" class="form-control" name="{{ $site->nameSetting }}" value="{{ $site->value }}">
								   @else
									   <textarea class="form-control" name="{{ $site->nameSetting }}">{{ $site->value }}</textarea>
								   @endif

				 	                 @if ($errors->has($site->nameSetting))
				 	                     <span class="help-block">
				 	                         <strong>{{ $errors->first($site->nameSetting) }}</strong>
				 	                     </span>
				 	                 @endif
				 	             </div>
				 	         </div>
		            		@endforeach

						<div class="form-group">
			 	             <div class="col-md-9">
			 	                 <button type="submit" class="btn btn-primary" name="submit">
			 	                     <i class="fa fa-btn fa-save"></i> save the site Setting
			 	                 </button>
			 	             </div>
			 	         </div>
					</form>
				   </div>
			    </div>
	    		</div>
    		</div>
	</section>
@endsection
