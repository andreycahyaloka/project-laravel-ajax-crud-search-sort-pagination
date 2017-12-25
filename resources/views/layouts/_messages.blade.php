<!-- session flash messages -->
<div class="container-fluid">
	@if (Session::has('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> {{ Session::get('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	@if (count($errors) > 0)
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<h4 class="alert-heading">Errors!</h4>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<hr />
			<ul>
				@foreach ($errors->all() as $error)
					<small><li>{{ $error }}</li></small>
				@endforeach
			</ul>
		</div>
	@endif
</div>