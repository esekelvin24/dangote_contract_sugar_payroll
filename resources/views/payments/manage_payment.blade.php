@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		@csrf
		<div class="element-wrapper">
			<h6 class="element-header">
				Manage Payments
			</h6>
			<div class="element-box">

				<h5 class="form-header">
					<span class="search" style="cursor: pointer;"><img style="width:30px; height:30px" src="{{asset("_img/search.png")}}" alt="">	Advanced Search</span><br/>
					<fieldset class="search_box" style="display: none;">
						<legend>Select search criteria</legend>
							<div class="row">
								<div class="col-xs-4 col-sm-3 col-md-2 col-xl-2">
									<div class="form-check">
										<label style="font-size: 13px"><input autocomplete="off" class="form-check-input" name="options" type="radio" value="name"><span style="display: inline-block;padding-top: 5px; font-size: 14px">Student Name</span></label>
									</div>
								</div>
								<div class="col-xs-4 col-sm-3 col-md-2 col-xl-2">
									<div class="form-check">
										<label style="font-size: 13px; display: inline-block;"><input autocomplete="off" class="form-check-input" name="options" type="radio" value="session"><span style="display: inline-block;padding-top: 5px; font-size: 14px">Session</span></label>
									</div>
								</div>

								<div class="col-xs-4 col-sm-3 col-md-2 col-xl-2">
									<div class="form-check">
										<label style="font-size: 13px;"><input autocomplete="off" class="form-check-input" name="options" type="radio" value="timeframe"><span style="display: inline-block;padding-top: 5px; font-size: 14px">Time frame</span></label>
									</div>
								</div>
							</div>
						<div style="display: none; margin-top: 25px" class="name all_hide">
							<div class="form-group row">
								<label style="font-size: 14px" class="col-form-label col-sm-4" for=""> Student Name</label>
								<div class="col-sm-4">
									<input autocomplete="off" class="form-control search_name" placeholder="Type Student Name" type="text">
								</div>
								<div class="col-sm-4">
									<button class="btn btn-primary search" type="button"> Search</button>
								</div>
							</div>
						</div>
						<div style="display: none; margin-top: 25px" class="session all_hide">
							<div class="form-group row">
								<label style="font-size: 14px"  class="col-form-label col-sm-4" for=""> Select Session</label>
								<div class="col-sm-4">
									<select autocomplete="off" style="width:200px;" class="form-control form-control-sm rounded bright search_session">
										<option selected="selected" value="">Select Session</option>
										@if(isset($all_session_collection) && $all_session_collection->isNotEmpty())
											@foreach($all_session_collection as $val)
												<option  value="{{$val->session_id}}">{{$val->session_name}}</option>
											@endforeach
										@endif
									</select>
								</div>
								<div class="col-sm-4">
									<button class="btn btn-primary search" type="button"> Search</button>
								</div>
							</div>
						</div>
						<div style="display: none; margin-top: 25px" class="timeframe all_hide">
							<div class="form-group row">
								<label style="font-size: 14px"  class="col-form-label col-sm-3" for=""> Pick time-frame</label>
								<div class="col-sm-3">
									<div class="form-group">
										<label style="font-size: 14px"  for=""> Start Date</label>
										<div class="date-input">
											<input class="start_date form-control" placeholder="Start Date" type="text" value="">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label style="font-size: 14px"  for=""> End Date</label>
										<div class="date-input">
											<input class="end_date form-control" placeholder="End Date" type="text" value="">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<br>
									<button class="btn btn-primary search" type="button"> Search</button>
								</div>
							</div>
						</div>
					</fieldset>

				</h5>
				<div id="res">
				<div id="button"></div>
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
								<th></th>
								<th>Student</th>
								<th>Session</th>
								<th>Amount(N)</th>
								<th>Payment Ref</th>
								<th>Fee Type</th>
								<th>Payment Type</th>
								<th>Date</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
								<th>Student</th>
								<th>Session</th>
								<th>Amount(N)</th>
								<th>Payment Ref</th>
								<th>Fee Type</th>
								<th>Payment Type</th>
								<th>Date</th>
							</tr>
						</tfoot>
						<tbody>
						<?php $a=1; ?>
						@if(isset($latest_payment_collection) && $latest_payment_collection->isNotEmpty())
								@foreach($latest_payment_collection as $val)
									<tr>
										<td>{{$a}}</td>
										<td>{!! "<span data-id='".$val->user_id."' style='cursor:pointer' class='badge badge-success'>".strtoupper($val->firstname.' '.$val->middlename.' '.$val->lastname)."</span>" !!}</td>
										<td>{{$val->session_name?$val->session_name:"---"}}</td>
										<td>{!! '<span style="font-weight:700">'.number_format($val->amount).'</span>' !!}</td>
										<td>{!! "<span class='badge badge-warning'>".$val->ref."</span>" !!}</td>
										<td>{!!  $val->payment_type==2?"<span class='badge badge-danger'>Acceptance Fee</span>":"<span class='badge badge-primary'>General Fee</span>" !!}</td>
										<td>
											@if($val->part_payment==0)
												<span class='badge badge-success-inverted'>FULL PAYMENT</span>
											@elseif($val->part_payment==1)
												<span class='badge badge-warning-inverted'>PART PAYMENT (60%)</span>
											@elseif($val->part_payment==2)
												<span class='badge badge-primary-inverted'>PART PAYMENT (40%)</span>
											@endif
										</td>
										<td>{{ date('d-M-Y h:i A',strtotime($val->creation_date)) }}</td>
									</tr>
										<?php $a++; ?>
								@endforeach
						@endif

						</tbody>
					</table>
				</div>
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
	<script src="{{asset('data/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
	<script src="{{asset('data/JSZip-2.5.0/jszip.min.js')}}"></script>
	<script>

		var start_date = new Date();
		var end_date = new Date();
		start_date.setDate(start_date.getDate() - 7);
		end_date.setDate(end_date.getDate() + 7);

		$('input.start_date').daterangepicker({
			"singleDatePicker": true,
			locale: {
				format: 'YYYY-MM-DD'
			},
			startDate: start_date,
		});
		$('input.end_date').daterangepicker({
			"singleDatePicker": true,
			locale: {
				format: 'YYYY-MM-DD'
			},
			startDate: end_date,
		});

	if ($('#dataTable1').length) {
		var table = $('#dataTable1').DataTable({
			dom : 'Bfrtip',
			pageLength : 100,
			buttons: [
				{
					title: 'IAUE General Receipt &nbsp;&nbsp;&nbsp;',
					extend: 'pdfHtml5',
					//orientation: 'landscape',
					pageSize: 'LEGAL',
					text: '<i class="fa fa-file-pdf-o"> Download PDF</i>',
					titleAttr: 'PDF',
					customize: function(doc) {
						doc.styles.title = {
							color: 'black',
							fontSize: '20',
							alignment: 'center'
						}
						doc.styles.tableHeader = {
							color: 'black',
							alignment: 'right'
						}
						doc.styles.tableBodyEven = {
							alignment: 'right'
						}
						doc.styles.tableBodyOdd = {
							alignment: 'right'
						}
						doc.styles.tableFooter = {
							alignment: 'right'
						}
						/*doc.styles['td:nth-child(2)'] = {
							width: '100px',
							'max-width': '100px'
						}*/
					}
				},
				{
					extend: 'print',
					title: 'IAUE General Receipt &nbsp;&nbsp;&nbsp;',
					text: '<i class="fa fa-print"> Print</i>',
					customize: function ( win ) {
						$(win.document.body)
								.css( 'font-size', '10pt' )
								.prepend(
										'<img src="{{asset('_img/watermark.png')}}" style="position:absolute; top:10px; left:10px; opacity:0.5" />'
								);

						$(win.document.body).find( 'table' )
								.addClass( 'compact' )
								.css( 'font-size', 'inherit' );
					}
				},
				{
					text: '<i class="fa fa-file-excel-o"> Excel</i>',
					extend: 'excelHtml5',
					title: 'IAUE General Receipt',
					'autoFilter': true
				}
			]

		});
		table.buttons().container().appendTo($('#button', table.table().container()));
	}

	$('body').on('click','span[data-id]',function(e)
	{
		e.preventDefault();
		var no=$(this).data("id");
		var toks=$("input[name='_token']").val();
		var da_link="{{route('student_profile_view')}}";
		$.ajax(
				{
					type:"GET",
					url:`${da_link}/${no}`,
					beforeSend:function()
					{
					},
					success: function(r)
					{
						$('table').unblock();
						$('div.modal-body').html(r);
						$('.edit_area').modal(
								{
									backdrop: 'static',
									keyboard: false
								});
					}
				}

		);
	});

	$('body').on('click','span.search',function(){
		$("fieldset.search_box").slideToggle();
	});

	$('body').on('click','input[name="options"]',function(){
		$("div.all_hide").slideUp();
		var da_class=$(this).val();
		$(`div.${da_class}`).slideDown();
	});

	/*$('body').on('keyup','input.search_name',function(){
		console.log($(this).val());
	})*/

	$('body').on('click','button.search',function(){
		var toks=$("input[name='_token']").val();
		var animation_image_path="{{asset("_img/payment.gif")}}";
		switch($('input[name="options"]:checked').val()){
			case 'name':
				var da_link="{{route('get_payments_by_name')}}";
				var name=$.trim($('input.search_name').val());
				$.ajax(
						{
							type:"POST",
							url:`${da_link}`,
							data:{_token:toks,name},
							beforeSend:function()
							{
								$('div#res').html("...fetching data");
								$('body').block({ message: `<img src='${animation_image_path}' >` });
							},
							success: function(r)
							{
								$('div#res').html(r);
								$('body').unblock();
							}
						}
				);
				break;
			case 'session':
				var da_link="{{route('get_payments_by_session')}}";
				var session_id=$.trim($('select.search_session').val());
				$.ajax(
						{
							type:"POST",
							url:`${da_link}`,
							data:{_token:toks,session_id},
							beforeSend:function()
							{
								$('div#res').html("...fetching data");
								$('body').block({ message: `<img src='${animation_image_path}' >` });
							},
							success: function(r)
							{
								$('div#res').html(r);
								$('body').unblock();
							}
						}
				);
				break;
			case 'timeframe':
				var da_link="{{route('get_payments_by_time_frame')}}";
				var start_date=$.trim($('input.start_date').val());
				var end_date=$.trim($('input.end_date').val());
				$.ajax(
						{
							type:"POST",
							url:`${da_link}`,
							data:{_token:toks,start_date,end_date},
							beforeSend:function()
							{
								$('div#res').html("...fetching data");
								$('body').block({ message: `<img src='${animation_image_path}' >` });
							},
							success: function(r)
							{
								$('div#res').html(r);
								$('body').unblock();
							}
						}
				);
				break;
		}
	})



	</script>
@endsection
