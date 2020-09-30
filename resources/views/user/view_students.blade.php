@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		<div class="element-wrapper">
			<h6 class="element-header">
				All Students List (@if( !isset($student_collection) || $student_collection->isEmpty() ) 0 @else{{$student_collection->count()}}@endif)
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
								<th></th>
								<th>Student Name</th>
								<th>Programme</th>
								<th>Faculty</th>
								<th>Department</th>
								<th>Entry Type</th>
								<th>Session</th>
								<th>Date Applied</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
								<th>Student Name</th>
								<th>MAT No.</th>
								<th>Programme</th>
								<th>Faculty</th>
								<th>Department</th>
								<th>Entry Type</th>
								<th>Session</th>
								<th>Date Applied</th>
							</tr>
						</tfoot>
						<tbody>
						<?php $a=1 ?>
                        @if(isset($student_collection))
						@foreach($student_collection as $val)
							<tr>
								<td>
									{{$a}}
								</td>
								<td class="center">
									<span style="cursor: pointer" data-id="{{$val->user_id}}">
									<img class="img-rounded" height="30" width="30" src='{{ asset("_img/users/".$val->pics) }}'/><br/>
									{!!  '<span class="badge badge-success-inverted">'.$val->firstname." ".$val->middlename." ".$val->lastname.'</span>' !!}
									</span>
								</td>
								<td>{!! \App\Http\Controllers\Utilities::get_matric_number($val->user_id) !!}</td>
								<td>{{$val->degree_short_name." ,".$val->name}}</td>
								<td>{{$val->faculty_name}}</td>
								<td>{{$val->department_name}}</td>
								<td>{!! $val->entry_type==1?"<span class='badge badge-primary'>Regular</span>":"<span class='badge badge-success'>Direct Entry</span>" !!}</td>
								<td>{{$val->session_name}}</td>
								<td>{{date("d-F-Y h:i A",strtotime($val->date_applied))}}</td>
							</tr>
							<?php $a++ ?>
						@endforeach
                        @else
                            You have no students yet
                        @endif
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
	<script src="{{asset('data/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
	<script src="{{asset('data/JSZip-2.5.0/jszip.min.js')}}"></script>
	<script>
	if ($('#dataTable1').length) {
	/*$('#dataTable1').DataTable({
		dom : 'Bfrtip',
		pageLength : 100,
		buttons: [
			{
				title: 'IAUE Students View',
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
			},
			{
				extend: 'print',
				title: 'IAUE Students View',
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
				title: 'IAUE Students View',
				'autoFilter': true
			}
		]
	});*/
	}
	$('body').on('click','span[data-id]',function(e)
	{
		e.preventDefault();
		var no=$(this).data("id");
		var da_link="{{route('student_profile_view')}}";
		$.ajax(
				{
					type:"GET",
					url:`${da_link}/${no}`,
					beforeSend:function()
					{
						$('table').block({ message: null });
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
	</script>
@endsection
