@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger lead">
			{{$error}}
		</div>
	@endforeach
@endif

@if(session('error'))
	<div class="alert alert-danger lead">
		{{session('error')}}
	</div>
@endif

@if(session('succes'))
	<div class="alert alert-success lead">
		{{session('succes')}}
	</div>
@endif