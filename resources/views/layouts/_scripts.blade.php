<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- jquery -->
<script src="{{ asset('storage/jquery/jquery-3.2.1.min.js') }}" crossorigin="anonymous"></script>

<!-- jquery ui -->
<script src="{{ asset('storage/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}" crossorigin="anonymous"></script>

<!-- popper -->
<script src="{{ asset('storage/jquery/popper.min.js') }}" crossorigin="anonymous"></script>

<!--bootstrap javascript-->
<script src="{{ asset('storage/bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>

<!-- datatables -->
<!-- <script src="{{ asset('storage/datatables/datatables.min.js') }}" crossorigin="anonymous"></script> -->
<!-- <script src="{{ asset('storage/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script> -->

<script>
// button go to top
	// When the user scrolls down 100px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};
	function scrollFunction() {
		if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
			document.getElementById("btnGoToTop").style.display = "block";
		} else {
			document.getElementById("btnGoToTop").style.display = "none";
		}
	}
	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0; // For Chrome, Safari and Opera 
		document.documentElement.scrollTop = 0; // For IE and Firefox
	}

// sidenav
	/* Set the width of the side navigation to 250px */
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("mySidenav").style.opacity = "1";
	}
	// side navbar background
	function openNavBG() {
		document.getElementById("mySidenavBG").style.width = "100%";
		document.getElementById("mySidenavBG").style.opacity = "0.5";
	}

	/* Set the width of the side navigation to 0 */
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0%";
		document.getElementById("mySidenav").style.opacity = "0";
		document.getElementById("mySidenavBG").style.width = "0%";
		document.getElementById("mySidenavBG").style.opacity = "0";
	}
</script>



<!-- ajax crud -->
<script type="text/javascript">
	// onload page
	$(document).ready(function($) {
		console.log('ready');

		indexAjax();

		// modal create onshow autofocus
		$('#myModalCreate').on('shown.bs.modal', function() {
			$('#titleCreate').trigger('focus');
		});

		// modal create onhide
		$('#myModalCreate').on('hidden.bs.modal', function() {
			$('#alertCreateSuccess').hide();
			$('#alertCreateError').hide();
			document.getElementById('myFormCreate').reset();
		});

		// modal edit onhide
		$('#myModalEdit').on('hidden.bs.modal', function() {
			$('#alertEditSuccess').hide();
			$('#alertEditError').hide();
			document.getElementById('myFormEdit').reset();
		});

		// store button
		$('#myButtonStore').click(function(event) {
			console.log('store button clicked');

			event.preventDefault();

			storeAjax();
		});

		// edit button
		$('#tbodyData').on('click', '.btn-outline-primary', function() {
			id = $(this).data('id');

			console.log(id);

			editAjax(id);
		});

		// update button
		$('#myButtonUpdate').click(function(event) {
			console.log('update button clicked');

			event.preventDefault();
			id = $('#idEdit').val();

			updateAjax(id);
		});

		// delete button
		$('#tbodyData').on('click', '#showMyModalDelete', function() {
			id = $(this).data('id');

			console.log(id);

			deleteAjax(id);
		});

		// destroy button
		$('#myButtonDestroy').click(function(event) {
			console.log('destroy button clicked');

			event.preventDefault();
			id = $('#idDelete').val();

			destroyAjax(id);
		});

		// // destroy button
		// $('#tbodyData').on('click', '.btn-outline-danger', function() {
		// 	id = $(this).data('id');

		// 	console.log(id);

		// 	destroyAjax(id);
		// });
	});

	// index function
	function indexAjax() {
		// clear table data
		$('#tbodyData').empty();

		$.ajax( {
			type: 'GET',
			url: '/guest/indexajax',
		})
		.done(function(data) {
			console.log('success');

			var number = 1;
			$.each(data, function(index, val) {
				$('#tbodyData').append('<tr>')
					$('#tbodyData').append('<td>'+ number++ +'</td>')
					$('#tbodyData').append('<td>'+val.title+'</td>')
					$('#tbodyData').append('<td>'+val.body+'</td>')
					$('#tbodyData').append('<td>'+val.created_at+'</td>')
					$('#tbodyData').append('<td>'+val.updated_at+'</td>')
					$('#tbodyData').append('<td class="text-center">'+
												'<div class="form-row">'+
													'<div class="form-group col-md-4">'+
														'<button type="button" class="btn btn-outline-info btn-block btn-sm" data-id="'+val.id+'">'+
															'<i class="fa fa-eye"></i>'+
														'</button>'+
													'</div>'+
													'<div class="form-group col-md-4">'+
														'<button type="button" class="btn btn-outline-primary btn-block btn-sm" data-toggle="modal" data-target="#myModalEdit" data-id="'+val.id+'">'+
															'<i class="fa fa-edit"></i>'+
														'</button>'+
													'</div>'+
													'<div class="form-group col-md-4">'+
														'<button type="button" class="btn btn-outline-danger btn-block btn-sm" id="showMyModalDelete" data-toggle="modal" data-target="#myModalDelete" data-id="'+val.id+'">'+
															'<i class="fa fa-trash"></i>'+
														'</button>'+
													'</div>'+
												'</div>'+
											'</td>')
				$('#tbodyData').append('</tr>')
			});
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});
	}

	// store function
	function storeAjax() {
		myFormCreate = $('#myFormCreate').serializeArray();

		console.log(myFormCreate);

		$.ajax( {
			type: 'POST',
			url: '/guest/storeajax',
			dataType: 'JSON',
			data: myFormCreate,
		})
		.done(function() {
			console.log('success');

			document.getElementById('myFormCreate').reset();

			$('#alertCreateSuccess').show();
			$('#alertCreateError').hide();

			indexAjax();
		})
		.fail(function(data) {
			console.log('error');

			$('#alertCreateSuccess').hide();
			$('#alertCreateError').show();

			$('#alertCreateErrorList').empty();
			// $('#alertErrorList').prepend('Error(s)!');
			$.each(data.responseJSON, function(componentId, val) {
				console.log(componentId+","+val);

				// $('input[id='+componentId+']').after('<span>'+val+'</span>');
				// $('textarea[id='+componentId+']').after('<span>'+val+'</span>');
				$('#alertCreateErrorList').append('<small><li>'+val+'</li></small>');
			});
		})
		.always(function() {
			console.log('complete');
		});
	}

	// edit function
	function editAjax(id) {
		$.ajax( {
			type: 'GET',
			url: '/guest/editajax/'+id,
		})
		.done(function(data) {
			console.log('success');

			$('#titleEdit').val(data.title);
			$('#bodyEdit').val(data.body);
			$('#idEdit').val(data.id);
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});
	}

	// update function
	function updateAjax(id) {
		myFormEdit = $('#myFormEdit').serializeArray();

		console.log(myFormEdit);

		$.ajax( {
			type: 'PUT',
			url: '/guest/updateajax/'+id,
			dataType: 'JSON',
			data: myFormEdit,
		})
		.done(function() {
			console.log('success');

			$('#alertEditSuccess').show();
			$('#alertEditError').hide();

			indexAjax();
		})
		.fail(function(data) {
			console.log('error');

			$('#alertEditSuccess').hide();
			$('#alertEditError').show();

			$('#alertEditErrorList').empty();
			$.each(data.responseJSON, function(componentId, val) {
				console.log(componentId+","+val);

				$('#alertEditErrorList').append('<small><li>'+val+'</li></small>');
			});
		})
		.always(function() {
			console.log('complete');
		});
	}

	// delete function
	function deleteAjax(id) {
		$.ajax( {
			type: 'GET',
			url: '/guest/deleteajax/'+id,
		})
		.done(function(data) {
			console.log('success');

			$('#titleDelete').val(data.title);
			$('#bodyDelete').val(data.body);
			$('#idDelete').val(data.id);
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});
	}

	// destroy function
	function destroyAjax(id) {
		$.ajax( {
			type: 'DELETE',
			url: '/guest/destroyajax/'+id,
			dataType: 'JSON',
			data: {_token: '{{ csrf_token() }}'},
		})
		.done(function() {
			console.log('success');

			indexAjax();
		})
		.fail(function() {
			console.log('error');

			$('#alertError').show();
		})
		.always(function() {
			console.log('complete');
		});
	}
</script>