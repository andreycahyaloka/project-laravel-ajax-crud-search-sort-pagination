@extends('layouts.master')

@section('title', '| Guest Index')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-sm-offset-1">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Posts
				</div>

				<div class="card-body mb-0 pb-0">
					<div class="form-row">
						<div class="col-md-6">
							<h4 class="card-title">List</h4>
							<h6 class="card-subtitle mb-2 text-muted">
								{{ $posts->total() }} Post(s) ({{ $posts->lastItem() }} of {{ $posts->total() }})
							</h6>
						</div>
						<div class="col-sm-offset-4 col-md-2">
							<button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#myModalCreate">
								<i class="fa fa-plus"></i> New Post
							</button>
						</div>
					</div>

					<p class="card-text">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center" style="min-width:50px;">#</th>
										<th style="min-width:150px;">Title</th>
										<th style="min-width:250px;">Body</th>
										<th style="min-width:125px;">Created At</th>
										<th style="min-width:125px;">Last Updated</th>
										<th class="text-center"style="min-width:150px;">Option</th>
									</tr>
								</thead>

								<tbody id="tbodyData">
									<tr>
										<th >#</th>
										<td>title</td>
										<td>body</td>
										<td>
											created_at
										</td>
										<td>
											updated_at
										</td>
										<td class="text-center">
											<div class="form-row">
												<div class="form-group col-md-4">
													<button type="button" class="btn btn-outline-info btn-block btn-sm">
														<i class="fa fa-eye"></i>
													</button>
												</div>
												<div class="form-group col-md-4">
													<button type="button" class="btn btn-outline-primary btn-block btn-sm">
														<i class="fa fa-edit"></i>
													</button>
												</div>
												<div class="form-group col-md-4">
													<button type="button" class="btn btn-outline-danger btn-block btn-sm">
														<i class="fa fa-trash"></i>
													</button>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</p>
				</div>

				<div class="card-footer border-dark bg-transparent mb-0 mt-0 pb-0 pt-0">
					{{-- $posts->links() --}}
				</div>
			</div>
		</div>
	</div>
	<hr class="border-dark" />



<!-- modal section (inside container) -->

<!-- modal create -->
	<div class="modal fade" id="myModalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalCreateLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalCreateLabel">Create</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mb-0 pb-0">
					<!-- alert success -->
					<div class="alert alert-success" role="alert" id="alertCreateSuccess" style="display: none;">
						<strong>Success!</strong>
					</div>
					<!-- alert error -->
					<div class="alert alert-danger" role="alert" id="alertCreateError" style="display: none;">
						<h5 class="alert-heading">Errors!</h5>
						<hr class="mb-1" />
						<div id="alertCreateErrorList"></div>
					</div>

					<form action="{{ route('guest.indexajax') }}" method="POST" id="myFormCreate">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Title:</label>
							<input type="text" class="form-control" name="titleCreate" id="titleCreate" autocomplete='off' required />
						</div>
						<div class="form-group">
							<label>Body:</label>
							<textarea class="form-control" rows="3" name="bodyCreate" id="bodyCreate" required></textarea>
							<!-- <input type="hidden" name="idEdit" id="idEdit" value="" disabled="" /> -->
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-success" id="myButtonStore" data-dismiss="modalx">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<!-- modal edit -->
	<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalEditLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalEditLabel">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mb-0 pb-0">
					<!-- alert success -->
					<div class="alert alert-success" role="alert" id="alertEditSuccess" style="display: none;">
						<strong>Success!</strong>
					</div>
					<!-- alert error -->
					<div class="alert alert-danger" role="alert" id="alertEditError" style="display: none;">
						<h5 class="alert-heading">Errors!</h5>
						<hr class="mb-1" />
						<div id="alertEditErrorList"></div>
					</div>

					<form action="{{ route('guest.indexajax') }}" method="PUT" id="myFormEdit">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Title:</label>
							<input type="text" class="form-control" name="titleEdit" id="titleEdit" autocomplete='off' required />
						</div>
						<div class="form-group">
							<label>Body:</label>
							<textarea class="form-control" rows="3" name="bodyEdit" id="bodyEdit" required></textarea>
							<input type="hidden" name="idEdit" id="idEdit" value="" disabled="" />
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-success" id="myButtonUpdate">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<!-- modal delete -->
	<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalDeleteLabel">Delete</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mb-0 pb-0">
					<form action="{{ route('guest.indexajax') }}" method="DELETE" id="myFormDelete">
						{{ csrf_field() }}

						<div class="form-group">
							<label class="mb-3">Are you sure you want to delete this post?</label>
							<input type="text" class="form-control" name="titleDelete" id="titleDelete" readonly />
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-danger" data-dismiss="modal" id="myButtonDestroy">Destroy</button>
					</form>
				</div>
			</div>
		</div>
	</div>



</div>

@endsection