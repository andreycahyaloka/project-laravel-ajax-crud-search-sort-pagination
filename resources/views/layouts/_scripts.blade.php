<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- jquery -->
<script src="{{ asset('storage/jquery/jquery-3.2.1.min.js') }}" crossorigin="anonymous"></script>

<!-- jquery ui -->
<!-- <script src="{{ asset('storage/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}" crossorigin="anonymous"></script> -->

<!-- popper -->
<script src="{{ asset('storage/jquery/popper.min.js') }}" crossorigin="anonymous"></script>

<!--bootstrap javascript-->
<script src="{{ asset('storage/bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>

<!-- datatables -->
<!-- <script src="{{ asset('storage/datatables/datatables.min.js') }}" crossorigin="anonymous"></script> -->
<script src="{{ asset('storage/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>

<!-- ajax -->
<script type="text/javascript">
	// 
	$(document).ready(function($) {
		// modal onshow -> title input autofocus
		$('#modal-form').on('shown.bs.modal', function() {
			$('#title').trigger('focus');
		});
	});

	var table = $('#post-table').DataTable( {
					processing: true,
					serverSide: true,
					ajax: '{{ route("api.post") }}',
					columns: [
						{data: 'id', name: 'id'},
						{data: 'title', name: 'title'},
						{data: 'body', name: 'body', orderable: false},
						{data: 'created_at', name: 'created_at'},
						{data: 'updated_at', name: 'updated_at'},
						{data: 'action', name: 'action', orderable: false, searchable: false}
					]
				});

	function addForm() {
		save_method = 'add';
		$('input[name=_method]').val('POST');
		$('#modal-form').modal('show');
		$('#alertError').hide();
		$('#modal-form form')[0].reset();
		$('.modal-title').text('Add Post');
	}

	function editForm(id) {
		save_method = 'edit';
		$('input[name=_method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax( {
			url : '{{ url("post") }}' + '/' + id + '/edit',
			type : 'GET',
			dataType : 'JSON',
			success : function(data) {
				$('#modal-form').modal('show');
				$('#alertError').hide();
				$('.modal-title').text('Edit Post');
				$('#id').val(data.id);
				$('#title').val(data.title);
				$('#body').val(data.body);
			},
			error : function() {
				alert('Nothing Data');
			}
		});
	}

	function deleteData(id) {
		var popup = confirm('Are you sure for delete this data ?');
		var csrf_token = $('meta[name="csrf-token"]').attr('content');
		if(popup == true) {
			$.ajax( {
				url : '{{ url("post") }}' + '/' + id,
				type : 'POST',
				data : {'_method' : 'DELETE', '_token' : csrf_token},
				success : function(data) {
					table.ajax.reload();
					console.log(data);
				},
				error : function() {
					alert('Oops! Something wrong!');
				}
			});
		} 
	}

	$(function() {
		$('#modal-form form').on('submit', function(e) {
			if(!e.isDefaultPrevented()) {
				var id = $('#id').val();
				if(save_method == 'add') url = '{{ url("post") }}';
				else url = '{{ url("post") . "/" }}' + id;

				$.ajax( {
					url : url,
					type : 'POST',
					data : $('#modal-form form').serialize(),
					success : function($data) {
						$('#modal-form').modal('hide');
						table.ajax.reload();
					},
					error : function(data) {
						// alert('Oops! Something error!');

						$('#alertError').show();
						$('#alertErrorList').empty();
						$.each(data.responseJSON, function(componentId, val) {
							console.log(componentId+","+val);
							$('#alertErrorList').append('<small><li>'+val+'</li></small>');
						});
					}
				});
				return false;
			}
		});
	});
</script>