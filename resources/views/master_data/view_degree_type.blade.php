@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		<div class="element-wrapper">
			<h6 class="element-header">
				Created Degree Types (@if( $degree_type_collection->isEmpty() ) 0 @else{{$degree_type_collection->count()}}@endif)
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
							@if(Route::current()->getName() == 'edit_degree_type')
								<th></th>
							@endif
							<th>S/N</th>
							<th>Degree Name</th>
							<th>Degree Short Name</th>
							<th>Classification</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							@if(Route::current()->getName() == 'edit_degree_type')
								<th></th>
							@endif
							<th>S/N</th>
							<th>Degree Name</th>
							<th>Degree Short Name</th>
							<th>Classification</th>
						</tr>
						</tfoot>
						<tbody>
						@foreach($degree_type_collection as $key=>$val)
							<tr>
								@if(Route::current()->getName() == 'edit_degree_type')
									<td>
										<i title="Edit {{ $val->degree_name}}" style="cursor: pointer" data-id="{{ $val->degree_type_id }}" class="fa fa-edit"></i>
									</td>
								@endif
								<th>{{$key+1}}</th>
								<td>{{$val->degree_name}}</td>
								<td>{{$val->degree_short_name}}</td>
								<td>{{$val->degree_class==1?"Undergraduate":"Post Graduate"}}</td>
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
		@if(Route::current()->getName() == 'edit_degree_type')
		$('body').on('click','i[data-id]',function(e)
		{
			e.preventDefault();

			var no=$(this).data("id");
			var toks=$("input[name='_token']").val();

			$.ajax(
					{
						type:"POST",
						data:{id:no, _token:toks},
						url:"{{ route('get_edit_degree_type') }}",
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

		$('body').on('click','button.edit_degree_type',(function(e)
		{
		}));
		@endif


	</script>
@endsection
