@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		@if(Session::get('edit_success'))
			<div class="alert alert-success" style="margin-top:3px; margin-bottom:0">
				Programme edits were successful
			</div>
		@endif
		<div class="element-wrapper">
			<h6 class="element-header">
				Offered Programmes (@if( $programme_collection->isEmpty() ) 0 @else{{$programme_collection->count()}}@endif)
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
							@if(Route::current()->getName() == 'edit_programme')
								<th></th>
							@endif
							<th>S/N</th>
							<th>Status</th>
							<th>Accepts DE</th>
							<th>Programme Name</th>
							<th>Programme Type</th>
							<th>Faculty</th>
							<th>Department</th>
							<th>Duration</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							@if(Route::current()->getName() == 'edit_programme')
								<th></th>
							@endif
								<th>S/N</th>
								<th>Status</th>
								<th>Accepts DE</th>
								<th>Programme Name</th>
								<th>Programme Type</th>
								<th>Faculty</th>
								<th>Department</th>
								<th>Duration</th>
						</tr>
						</tfoot>
						<tbody>
						@foreach($programme_collection as $key=>$val)
							<tr>
								@if(Route::current()->getName() == 'edit_programme')
									<td>
										<i title="Edit {{ $val->name}}" style="cursor: pointer" data-id="{{ $val->programme_id }}" class="fa fa-edit"></i>
									</td>
								@endif
								<th>{{$key+1}}</th>
								<th>{!! $val->status==1?"<span class='badge badge-success'>Active</span>":"<span class='badge badge-danger'>Suspended</span>" !!}</th>
								<th>{!! $val->accepts_direct_entry==1?"<span class='badge badge-success'>YES</span>":"<span class='badge badge-danger'>NO</span>" !!}</th>
								<td>{{$val->degree_short_name." , ".$val->name}}</td>
								<td>{{ $val->program_type_name}}{!! $val->programme_type_id==1?" <span class='badge badge-warning'>(".$val->university.")<span>":"" !!}</td>
								<td>{{$val->faculty_name}}</td>
								<td>{{$val->department_name}}</td>
								<td>{{$val->duration}}</td>
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

		$('body').on('change','select#programme_type_id',(function(e)
		{
			var programme_type_id_id=$.trim($(this).val());
			if(programme_type_id_id==1){
				$("div.university").slideDown();
				$("select#university_id").removeAttr("disabled");
			}else if(programme_type_id_id==2){
				$("select#university_id").attr("disabled","disabled");
				$("select#university_id").val("");
				$("div.university").slideUp();
			}

		}));

		$("body").on('click','input#accepts_direct_entry',function(){
			if($(this).is(":checked")) {
				$("div.direct_entry_requirement").slideDown();
			}
			else {
				$("div.direct_entry_requirement").slideUp();
			}
		});

		@if(Route::current()->getName() == 'edit_programme')
		$('body').on('click','i[data-id]',function(e)
		{
			e.preventDefault();
			var no=$(this).data("id");
			var toks=$("input[name='_token']").val();

			$.ajax(
					{
						type:"POST",
						data:{id:no, _token:toks},
						url:"{{ route('get_edit_programme') }}",
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
                            CKEDITOR.replace('ckeditor1')
                            CKEDITOR.replace('normal_entry_requirement')
                            CKEDITOR.replace('direct_entry_requirement')
						}
					}
			);
		});

		$('body').on('change','select#faculty_id',(function(e)
		{
			var fac_id=$.trim($(this).val());
			if(fac_id!=""){
				$.ajax(
						{
							type:"POST",
							data:{id:fac_id,
								_token:$("input[name='_token']").val()
							},
							url:"{{route('get_departments')}}",
							beforeSend:function()
							{
								$('select#department_id').block({ message: "fetching departments" });
							},
							success: function(r)
							{
								$('select#department_id').unblock();
								if(r!="")
								{
									$('select#department_id').html(r);
								}

							}
						}
				);
			}

		}));

		$('body').on('click','button.edit_programme',(function(e)
		{
		}));
		@endif


	</script>
@endsection
