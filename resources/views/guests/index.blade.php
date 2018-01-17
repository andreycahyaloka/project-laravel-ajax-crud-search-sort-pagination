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
								<!--  -->
							</h6>
						</div>
						<div class="col-sm-offset-4 col-md-2">
							<button type="button" class="btn btn-outline-primary btn-block mb-2" onClick="addForm();">
								<i class="fa fa-plus"></i> New Post
							</button>
						</div>
					</div>

					<p class="card-text mb-0 pb-0">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="post-table">
								<thead>
									<tr>
										<th class="text-center" style="min-width:50px;">#</th>
										<th style="min-width:150px;">Title</th>
										<th style="min-width:250px;">Body</th>
										<th style="min-width:100px;">Created At</th>
										<th style="min-width:100px;">Last Updated</th>
										<th class="text-center"style="min-width:130px;">Option</th>
									</tr>
								</thead>

								<tbody id="myTbody">
									<!--  -->
								</tbody>
							</table>
						</div>
					</p>
				</div>

				<div class="card-footer border-dark bg-transparent mb-0 mt-0 pb-0 pt-0">
					<!--  -->
				</div>
			</div>
		</div>
	</div>
	<hr class="border-dark" />



<!-- modal section (inside container) -->

<!-- modal -->
	<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-formLabel" data-backdrop="static" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" data-toggle="validator">
					{{ csrf_field() }} {{ method_field('GET') }}

					<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body mb-0 pb-0">
						<div class="alert alert-danger" role="alert" id="alertError" style="display: none;">
							<h5 class="alert-heading">Errors!</h5>
							<hr class="mb-1" />
							<div id="alertErrorList"></div>
						</div>

						<input type="hidden" id="id" name="id" />
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" id="title" name="title" autocomplete="off" required autofocus />
							<span class="help-block with-errors"></span>
						</div>

						<div class="form-group">
							<label for="body">Body</label>
							<textarea class="form-control" id="body" name="body" autocomplete="off" required></textarea>
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-outline-success">Submit</button>
					</div>

				</form>
			</div>
		</div>
	</div>

</div>

@endsection