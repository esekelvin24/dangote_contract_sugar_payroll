@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		<div class="element-wrapper">
			<h6 class="element-header">
				All Users List (@if( $staff_collection->isEmpty() ) 0 @else{{$staff_collection->count()}}@endif)
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
                                @if(Route::current()->getName() == 'edit_user')
								<th></th>
                                @endif
								<th></th>
								<th>Title</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Designation</th>
								<th>Rights</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
                                @if(Route::current()->getName() == 'edit_user')
								<th></th>
                                @endif
								<th></th>
								<th>Title</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Designation</th>
								<th>Rights</th>
							</tr>
						</tfoot>
						<tbody>
						@foreach($staff_collection as $val)
							<tr>
                                @if(Route::current()->getName() == 'edit_user')
								<td><i title="Edit {{ $val->firstname." ".$val->lastname }}" style="cursor: pointer" data-id="{{ $val->id }}" class="fa fa-edit"></i></td>
                                @else
                                    {{--<td>
                                    <i title="View More info of {{ $val->firstname." ".$val->lastname }}" style="cursor: pointer" data-id="{{ $val->id }}" class="fa fa-eye"></i>
                                    </td>--}}
                                @endif
								<td class="center"><img class="img-rounded" height="30" width="30" src='{{ asset("_img/users/".$val->pics) }}'/></td>
								<td>{{$val->title_name}}</td>
								<td>{{$val->firstname}}</td>
								<td>{{$val->lastname}}</td>
								<td>{{$val->designation}}</td>
								<td>{{$val->rights_name}}</td>
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
	<script src="{{asset('data/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
	<script src="{{asset('data/JSZip-2.5.0/jszip.min.js')}}"></script>
	<script>
		if ($('#dataTable1').length) {
			$('#dataTable1').DataTable({
				dom : 'Bfrtip',
				pageLength : 100,
				buttons: [
					{
						title: 'IAUE User View',
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
						title: 'IAUE User View',
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
						title: 'IAUE User View',
						'autoFilter': true
					}
				]
			});
		}

	$('body').on('click','button.admin_save_profile_pic',function(e){
		e.preventDefault();
		var allowExt=['jpg','jpeg','png'];
		var filename= $("input[name='pic']").val();
		if(filename==""){
			vex.dialog.alert({
				unsafeMessage: `<div style="text-align: center"><img src="_img/barred.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    File is required</div>`,
			});
		}
		else if(!allowExt.includes(filename.split('.')[1])){
			vex.dialog.alert({
				unsafeMessage: `<div style="text-align: center"><img src="_img/barred.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    The file doesn't meet file upload type requirements. Only pdfs and image formats are allowed</div>`,
			});
		}
		else{
			var formData = new FormData($('form#admin_pic_submit')[0]);
			$.ajax(
					{
						type:"POST",
						data:formData,
						url:"{{route('submit_profile_pic')}}",
						cache:false,
						contentType:false,
						processData:false,
						beforeSend:function()
						{
							$('body').block({ message: null });
						},
						error: function(r)
						{
							$('body').unblock();
							vex.dialog.alert({
								unsafeMessage: `<div style="text-align: center"><img src="_img/barred.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    There were errors, please try again</div>`,
							});
						},
						success: function(r)
						{
							$('body').unblock();
							vex.dialog.alert({
								unsafeMessage: `<div style="text-align: center"><img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Profile picture successfully changed</div>`,
							});
							setTimeout(function(){
								window.location.reload();
							},2000);
						}

					}
			);
		}
	});

	$('body').on('click','i[data-id]',function(e)
			{
				e.preventDefault();

				var no=$(this).data("id");
				var toks=$("input[name='_token']").val();
				var da_link="{{route('profile')}}";

				$.ajax(
						{
							type:"GET",
							@if(Route::current()->getName() == 'edit_user')
							url:`${da_link}/${no}`,
							@endif
							beforeSend:function()
							{
								$('table').block({ message: null });
								$('div.modal-body').attr("data-print",no);
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

	$("#staff_pic").on('change', function() {

		var iden=$(this).attr('id');

		if(iden=="staff_pic")
		{
			var ext1=$.trim($('input[name="staff_pic"]').val().split('.').pop().toLowerCase());
			if(($.inArray(ext1, ['gif','png','jpg','jpeg']) == -1)  )
			{
				$('input[name="staff_pic"]').val("");
				$("#user-container").empty();
				sweetAlert("Oops...", "Invalid File Formats. Only Image File Formats like jpg, png, gif Allowed!", "error");
			}
			else
			{

				if (typeof(FileReader) == "undefined")
				{
					alert("Your browser doesn't support HTML5, Please use an upgraded version of Chrome or Mozilla Firefox");
				}
				else
				{

					var container = $("#user-container");

					//remove all previous selected files
					container.empty();

					//create instance of FileReader
					var reader = new FileReader();
					reader.onload = function(e) {
						$("<img />", {
							"src": e.target.result,
							"width": 150,
							"height":150,
							"class":"img-rounded"
						}).appendTo(container);
					}

					reader.readAsDataURL($(this)[0].files[0]);
				}
			}
		}

	});

	//Rights things
	$('form').on('change','select#rights_id',function(e)
	{
		var id=$(this).val();
		var toks=$("input[name='_token']").val();
		if(id!=="")
		{
			$.ajax(
					{
						type:"POST",
						data:{rights_id:id,
							_token:toks
						},
						url:"{{ route('get_user_rights') }}",
						beforeSend:function()
						{
							$('select#rights_id').block({ message: null });
						},
						success: function(r)
						{
							$('select#rights_id').unblock();

							$('div#here').html(r);
						}
					}
			);
		}else{
			$('div#here').html("Kindly select a Global Right in order to edit associated privileges");
		}

	});

	/*$('body').on('click','button.edit_staff',(function(e)
	{
		e.preventDefault();
		var formData = new FormData($('form#formValidate')[0]);

		$.ajax(
				{
					type:"POST",
					data:formData,
					url:"{{route('save_edits')}}",
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
						$('div.others_docs_here').html("");



						$('html, body').animate({scrollTop:$('body').offset().top-90},2000);
						swal("success!", "Edits were successfully saved", "success");
						window.location.reload();
					}

				}
		);


	}));*/


	</script>
@endsection
