@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		<div class="element-wrapper">
			<h6 class="element-header">
				Fees (@if( $fee_collection->isEmpty() ) 0 @else{{$fee_collection->count()}}@endif)
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
							@if(Route::current()->getName() == 'edit_fee')
								<th></th>
							@endif
							<th>S/N</th>
							<th>Session</th>
							<th>Fee Name</th>
							<th>Fee Amount</th>
							<th>Fee Type</th>
							<th>Fee Class</th>
							<th>Programme Type</th>
							<th>Programme</th>
							<th>Degree Class</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							@if(Route::current()->getName() == 'edit_fee')
								<th></th>
							@endif
								<th>S/N</th>
								<th>Session</th>
								<th>Fee Name</th>
								<th>Fee Amount</th>
								<th>Fee Type</th>
								<th>Fee Class</th>
								<th>Programme Type</th>
								<th>Programme</th>
								<th>Degree Class</th>
						</tr>
						</tfoot>
						<tbody>
						@foreach($fee_collection as $key=>$val)
							<tr>
								@if(Route::current()->getName() == 'edit_fee')
									<td>
										<i title="Edit {{ $val->fee_name}}" style="cursor: pointer" data-id="{{ $val->fee_id }}" class="fa fa-edit"></i>
									</td>
								@endif
								<th>{{$key+1}}</th>
								<td>{{$val->session_name}}</td>
								<td>{{$val->fee_name}}</td>
								<td>{{number_format($val->fee_amount,2)}}</td>
								<td>{{$val->fee_type==1?"General":"Specific"}}</td>
								<td>{!! $val->fee_class==1?"<span class='badge badge-success'>New Students</span>":"<span class='badge badge-info'>Returning Students</span>" !!}</td>
								<td>{{$val->program_type_name}}</td>
								<td>{{$val->fee_type==1?"All":$val->degree_short_name." , ".$val->name}}</td>
								<td>
									@if($val->degree_class==1)
										{{"Undergraduate"}}
									@elseif($val->degree_class==2)
										{{"Post Graduate"}}
									@else
										{{"----"}}
									@endif
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
	<script src="{{asset("bower_components/simple.money.format.js")}}"></script>
	<script>
		if ($('#dataTable1').length) {
			$('#dataTable1').DataTable({ buttons: ['copy', 'excel', 'pdf'] });
		}
		@if(Route::current()->getName() == 'edit_fee')
		$('body').on('click','i[data-id]',function(e)
		{
			e.preventDefault();
			var no=$(this).data("id");
			var toks=$("input[name='_token']").val();

			$.ajax(
					{
						type:"POST",
						data:{id:no, _token:toks},
						url:"{{ route('get_edit_fee') }}",
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
							$('#fee_amount').simpleMoneyFormat();
						}
					}
			);
		});

		$('body').on('change','select#fee_type',(function(e)
		{
			var type_id=$.trim($(this).val());
			if(type_id==1) {
				$("select#programme_id").prop('disabled', 'disabled');
				$("select#degree_class").prop('disabled', false);
			}
			else if(type_id==2) {
				$("select#programme_id").prop('disabled', false);
				$("select#degree_class").prop('disabled', 'disabled');
			}
		}));

		$('body').on('change','select#program_type_id',(function(e)
		{
			var id=$.trim($(this).val());
			if(id!="" && $("select#fee_type").val()==2){
				$.ajax(
						{
							type:"POST",
							data:{id,
								_token:$("input[name='_token']").val()
							},
							url:"{{route('get_programmes_for_types')}}",
							beforeSend:function()
							{
								$('body').block({ message: "fetching programmes..." });
							},
							success: function(r)
							{
								$('select#programme_id').unblock();
								if(r!="")
								{
									$('body').unblock();
									$('select#programme_id').html(r);
								}

							}
						}
				);
			}

		}));


		$('body').on('click','button.edit_fee',(function(e)
		{
			e.preventDefault();
			var fee_type=$.trim($("select#fee_type").val());
			var programme_type=$.trim($("select#program_type_id").val());
			var fee_name=$.trim($("input#fee_name").val());
			var fee_amount=$.trim($("input#fee_amount").val());

			if(!fee_type)
				swal("error!", "Fee type is compulsory", "error");
			else if(!programme_type)
				swal("error!", "Programme type is compulsory", "error");
			else if(!fee_name)
				swal("error!", "Fee name is compulsory", "error");
			else if(!fee_amount)
				swal("error!", "Fee Amount is compulsory", "error");
			else
				$('form').submit();
		}));
		@endif


	</script>
@endsection
