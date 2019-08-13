@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Attention!</strong>
			{{$error}}
		</div>
	@endforeach
@endif

@if(session('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<!-- <strong>Attention!</strong> -->
		{{session('success')}}
	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>error!</strong>
		{{session('error')}}
	</div>
@endif

