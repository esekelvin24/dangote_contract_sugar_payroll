@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		<div class="element-wrapper">
			<h6 class="element-header">
				Payments Portal
			</h6>
			@if(!isset($not_eligible))
			<div class="element-box">
				<select autocomplete="off" id="select_session" style="width:200px; float:right" class="form-control form-control-sm rounded bright">
					<option value="">Select Session</option>
					@if(isset($all_sessions_collections) && $all_sessions_collections->isNotEmpty())
						@foreach($all_sessions_collections as $val)
							<option
									@if($current_session_id==$val->session_id)
									selected="selected"
									@endif
									value="{{$val->session_id}}">{{$val->session_name}} SESSION</option>
						@endforeach
					@endif
				</select>
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
								<th>Fee Name</th>
								<th>Session</th>
								<th>Amount(N)</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
								<th>Fee Name</th>
								<th>Session</th>
								<th>Amount(N)</th>
							</tr>
						</tfoot>
						<tbody>
						<?php
						$a=1;
						?>
						@if(isset($fee_collection_generic) && $fee_collection_generic->isNotEmpty())
								@foreach($fee_collection_generic as $val)
									<tr>
										<td>{{$a}}</td>
										<td>{{strtoupper($val->fee_name)}}</td>
										<td>{{$val->session_name}}</td>
										<td>{!! number_format($val->fee_amount,2) !!}</td>
									</tr>
										<?php $a++; ?>
								@endforeach
						@endif
						@if(isset($fee_collection_specific) &&  $fee_collection_specific->isNotEmpty())
							@foreach($fee_collection_specific as $val)
								<tr>
									<td>{{$a}}</td>
									<td>{{strtoupper($val->fee_name)}}</td>
									<td>{{$val->session_name}}</td>
									<td>{!! number_format($val->fee_amount,2) !!}</td>
								</tr>
								<?php $a++; ?>
							@endforeach
						@endif
						@if(isset($all_expected_payments) && $all_expected_payments>0)
							<tr>
								<td></td>
								<td></td>
								<td style="text-align: right; font-weight: bold">TOTAL</td>
								<td style="text-align: left; font-weight: bold">{!! number_format($all_expected_payments,2) !!}</td>
							</tr>
						@endif
						@if(isset($current_session_payment_collection) && $current_session_payment_collection->isNotEmpty())
							@foreach($current_session_payment_collection as $val)
								<tr style="color:lightseagreen">
									<td></td>
									<td>ref:{{$val->ref}}&nbsp;&nbsp;&nbsp;{{date('d, M Y h:i A',strtotime($val->creation_date))}}</td>
									<td style="text-align: right; font-weight: bold">PAID</td>
									<td style="text-align: left; font-weight: bold">- {!! number_format($val->amount,2) !!}</td>
								</tr>
							@endforeach
						@endif
						<tr>
							<td></td>
							<td></td>
							<td style="text-align: right; font-weight: bold">BALANCE</td>
							<td style="text-align: left; font-weight: bold"> {!! number_format($all_expected_payments-$all_actual_payments,2) !!}</td>
						</tr>
						</tbody>
					</table>
					@if(isset($all_expected_payments) && $all_expected_payments>0 && $all_expected_payments-$all_actual_payments>500)
						@if($all_actual_payments>0 && $all_expected_payments-$all_actual_payments>500)
							<div style="text-align: center">
								<button class="btn btn-outline-success pay part bal" data-href="{{route("pay_fees",base64_encode(1))}}">Pay N{{number_format($all_expected_payments-$all_actual_payments,2)}} (Balance Fee)</button>
							</div>
						@else
							<div style="text-align: center">
								<button class="btn btn-outline-danger pay part" data-href="{{route("pay_fees",base64_encode(1))}}">Pay N{{number_format(($all_expected_payments*0.6),2)}} (60% Part Payment)</button>
								<button class="btn btn-outline-success pay" data-href="{{route("pay_fees",base64_encode(1))}}">Pay N{{number_format($all_expected_payments,2)}} (Complete Fee)</button>
							</div>
						@endif
					@endif
				</div>
			</div>
			@else
				<div align="center">
					<img width="150" height="150" src="{{asset('_img/barred.png')}}" >
					<p> You are not eligible to view this page <p>
				</div>
			@endif
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
	<script src="https://js.paystack.co/v1/inline.js"></script>
	<script id="paystack"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
	<script src="{{asset('data/JSZip-2.5.0/jszip.min.js')}}"></script>
	<script>
	if ($('#dataTable1').length) {
		var table = $('#dataTable1').DataTable({
			dom : 'Bfrtip',
			"bInfo" : false,
			"paging": false,
			"ordering": false,
			"searching": false,
			buttons: [
				/*{
					title: 'IAUE Fee',
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
						/!*doc.styles['td:nth-child(2)'] = {
							width: '100px',
							'max-width': '100px'
						}*!/
					}
				},*/
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
				}
			]

		});
		table.buttons().container().appendTo($('#button', table.table().container()));
	}

	$('body').on('click','button.pay',function(e){
		e.preventDefault();
		var route=$(this).data("href");
		var part=$(this).hasClass("part");
		var balance=$(this).hasClass("bal");
		$.ajax(
				{
					type:"GET",
					data:{part,balance},
					url:route,
					beforeSend:function()
					{
						$('body').block();
					},
					error: function(r)
					{
						$('body').unblock();
					},
					success: function(r)
					{
						$('body').unblock();
						$('#paystack').html(r);
						payWithPaystack();
					}
				}
		);
	});



	</script>
@endsection
