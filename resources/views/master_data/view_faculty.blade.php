@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		<div class="element-wrapper">
			<h6 class="element-header">
				Created Faculties (@if( $faculty_collection->isEmpty() ) 0 @else{{$faculty_collection->count()}}@endif)
			</h6>
			<div class="element-box">
				<div class="table-responsive">
					<style>
						.form-inline{
							display: block !important;
						}
						ul.pagination a {
							position: relative;
							display: block;
							padding: 0.5rem 0.75rem;
							margin-left: -1px;
							line-height: 1.25;
							color: #047bf8;
							background-color: #fff;
							border: 1px solid #dee2e6;
						}
					</style>
					<table id="dataTable1" class="table table-striped" style="width: 100% !important;">
						<thead>
						<tr>
							@if(Route::current()->getName() == 'edit_faculty')
								<th></th>
							@endif
							<th>S/N</th>
							<th>Faculty</th>
							<th>Dean</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							@if(Route::current()->getName() == 'edit_faculty')
								<th></th>
							@endif
							<th>S/N</th>
							<th>Faculty</th>
							<th>Dean</th>
						</tr>
						</tfoot>
						<tbody>
						@foreach($faculty_collection as $key=>$val)
							<tr>
								@if(Route::current()->getName() == 'edit_faculty')
									<td>
										<i title="Edit {{ $val->faculty_name}}" style="cursor: pointer" data-id="{{ $val->faculty_id }}" class="fa fa-edit"></i>
									</td>
								@endif
								<th>{{$key+1}}</th>
								<td>{{$val->faculty_name}}</td>
								<td><?php
 											echo !$val->firstname?"--Not Assigned--":"<span class='badge badge-primary'>".$val->firstname." ".$val->middlename." ".$val->lastname."</span>"
 											?>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade edit_area" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!-- //End Modal -->

@endsection

@section('required_js')
@endsection

@section('additional_js')
	<script>
		if ($('#dataTable1').length) {
			$('#dataTable1').DataTable({ buttons: ['copy', 'excel', 'pdf'] });
		}
		@if(Route::current()->getName() == 'edit_faculty')
		$('body').on('click','i[data-id]',function(e)
		{
			e.preventDefault();

			var no=$(this).data("id");
			var toks=$("input[name='_token']").val();

			$.ajax(
					{
						type:"POST",
						data:{id:no, _token:toks},
						url:"{{ route('get_edit_faculty') }}",
						beforeSend:function()
						{
							$('table').block({ message: null });
						},
						success: function(r)
						{
							$('table').unblock();
							$('div.modal-body').html(r);
							$('.edit_area').modal({
										backdrop: 'static',
										keyboard: false
							});

						}
					}

			);
		});

		$('body').on('click','button.edit_faculty',(function(e)
		{
			e.preventDefault();
			var formData = new FormData($('form#formValidate')[0]);

			$.ajax(
					{
						type:"POST",
						data:formData,
						url:"{{route('save_edit_faculty')}}",
						cache:false,
						contentType:false,
						processData:false,
						beforeSend:function()
						{
							$('form#formValidate').block({ message: null });
						},
						error: function(r)
						{
							$('form#formValidate').unblock();

							const errors = r.responseJSON.errors;
							var first=true;

							//clear any previous errors
							$('div.error-message').html('');
							$('div.has-error').removeClass('has-error');


							$.each(errors,function(index,value)
							{
								var others_re= new RegExp("^others");
								var staff_docs_re= new RegExp("^staff_docs");
								var g_things= new RegExp("^g_");

								var others_re_result=others_re.test(index);
								var staff_docs_re_result=staff_docs_re.test(index);
								var g_things_result=g_things.test(index);


								//for first item, kindly scroll into view
								if(first && (!others_re_result && !staff_docs_re_result && !g_things_result) )
								{
									$('html, body').animate({scrollTop:$('#'+index).offset().top-90},2000);
									$('#'+index).focus();
								}

								if(others_re_result || staff_docs_re_result || g_things_result )
								{
									if(first && g_things_result)
									{

										$('html, body').animate({scrollTop:$('table.guarantor').offset().top-90},2000);
										$('input[name^="g_"]').focus();
										sweetAlert("Oops...", "Guarantor Phone or Email in invalid Format", "error");
									}


									if(first && others_re_result)
									{
										$('input[name^="others"]').next('span.error-message').html(''+value);
										$('input[name^="others"]').closest('div.form-group').addClass('has-error');

										$('html, body').animate({scrollTop:$('input[name^="others"]').offset().top-90},2000);
										$('input[name^="others"]').focus();
										sweetAlert("Oops...", value, "error");
									}

									if(first && staff_docs_re_result)
									{
										$('input[name^="staff_docs"]').next('span.error-message').html(''+value);
										$('input[name^="staff_docs"]').closest('div.form-group').addClass('has-error');

										$('html, body').animate({scrollTop:$('input[name^="staff_docs"]').offset().top-90},2000);
										$('input[name^="staff_docs"]').focus();
										sweetAlert("Oops...", value, "error");
									}

								}
								else
								{
									$('#'+index).next('span.error-message').html(''+value);
									$('#'+index).closest('div.form-group').addClass('has-error');
								}



								first=false;
							})



						},
						success: function(r)
						{
							$('form#formValidate').unblock();

							//clear any previous errors
							$('div.error-message').html('');
							$('div.has-error').removeClass('has-error');
							$('div.has-success').removeClass('has-success');
							//clear all items
							$("#user-container").empty();
							$('form#formValidate')[0].reset();
							$('div#here').html("");
							$('html, body').animate({scrollTop:$('body').offset().top-90},2000);
							swal("success!", "Edits were successfully saved", "success");
							window.location.reload();
						}

					}
			);


		}));
		@endif


	</script>
@endsection
