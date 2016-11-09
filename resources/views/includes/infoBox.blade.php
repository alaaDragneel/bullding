@if(Session::has('fail'))
	<section class="alert alert-danger">
		{{ Session::get('fail') }}
	</section>
@endif

@if(Session::has('success'))
	<section class="alert alert-success">
		{{ Session::get('success') }}
	</section>
@endif

@if (count($errors) > 0)
	<section class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<i>{{ $error }}</i>
			@endforeach
		</ul>
	</section>
@endif
