@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		<div class="element-wrapper">
			
			<div class="element-box">
				<div id="page" class="table-responsive">
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



              @if(!isset($completed_assessement_collection[$assessement_id]) && substr($assessement_details->start_date,0,10)." ".$assessement_details->start_time < date('Y-m-d H:i:s'))

                    
									@if ( date("Y-m-d H:m:s") < substr($assessement_details->expiration_date,0,10)." ".$assessement_details->expiration_time && $authorise_to_take_assessment == true)
											
									
									<h5>Title: {{$course_details->course_title}}  </h5>
									<h5>Short Code: {{$course_details->short_code}}  </h5>
									<h5>Type: Continue Assessement {{$assessement_details->assessement_type}} </h5>  
									<h5>Duration : {{$global_assessement_weight->ca_duration}} minutes </h5>

										<h5>Instructions:</h5>
									<div style="border-style:solid; padding:20px">
												<strong>Before beginning the exam:</strong><br>
												<div style="margin-left:15px">
													1. &nbsp;&nbsp;&nbsp;Make sure you have good internet connection <br/>
													2. &nbsp;&nbsp;&nbsp;If you are taking your exam late in the day. it is recommended that you reboot your computer before beginning to free up memory resource from other programs on your computer<br/>
													3. &nbsp;&nbsp;&nbsp;Shut down all instant messaging tools (Skype, Facebook, WhatsApp, MSN Message) and email programs as the can conflict with the portal<br/>
													4. &nbsp;&nbsp;&nbsp;Maximize your browser window before starting the test. Minimizing the browser window during the exam can prevent the submission of your exam.<br/>
												</div> <br/>

												<strong>During the exam:</strong><br>
												<div style="margin-left:15px">
													1. &nbsp;&nbsp;&nbsp;Do not resize (minimize) the browser during the test <br/>
													2. &nbsp;&nbsp;&nbsp;Never click on the "Back" button on your browser. This will take you out of the test<br/>
													3. &nbsp;&nbsp;&nbsp;Click the "Next" button to navigate to the next question and note that you can not go back to the previous question <br/> 
													
												</div> <br/>
												<strong>Instructions accessing the exam:</strong><br>
												<div style="margin-left:15px">
													1. &nbsp;&nbsp;&nbsp;Do not resize (minimize) the browser during the test <br/>
													2. &nbsp;&nbsp;&nbsp;Never click on the "Back" button on your browser. This will take you out of the test<br/>
													3. &nbsp;&nbsp;&nbsp;Click the "Next" button to navigate to the next question and note that you can not go back to the previous question <br/> 
													
												</div> <br/>
									</div><br/>
									<div id="start" align="right" style="padding-right">
										<a id="start_assessement" class="btn btn-success"> Start Test</a>
									</div>

									@elseif($authorise_to_take_assessment == false)

											<div align="center">
												<img width="150" height="150" src="{{asset('_img/barred.png')}}" >
												<p> You are not authorise to take this assessement<p>
											</div>

									@else
									
											<div align="center">
												<img width="150" height="150" src="{{asset('_img/barred.png')}}" >
												<p> This assessement has expired<p>
											</div>

									@endif
				@elseif (substr($assessement_details->start_date,0,10)." ".$assessement_details->start_time < date('Y-m-d H:i:s'))

					<div align="center">
						<img width="150" height="150" src="{{asset('_img/barred.png')}}" >
						<p> C.A is closed at the moment please try again later<p>
					</div>
				@else
					
						<div align="center">
							<img width="150" height="150" src="{{asset('_img/barred.png')}}" >
						<p> You have already taken this C.A  <p>
						</div>
				
				@endif

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




$('div#start').on('click','#start_assessement',(function(e)
		{
			var toks=$("input[name='_token']").val();
			
			$.ajax(
						{
							type:"POST",
							data:{id:'{{base64_encode($assessement_details->assessment_id)}}', _token:toks, from:'{{base64_encode("home")}}'},
							url:"{{ route('next_question') }}",
							beforeSend:function()
							{
								$('table').block({ message: null });
								
							},
							success: function(r)
							{
								$("#page").html(r);
							}
						}

				);
			
		}));






	if ($('#dataTable1').length) {
	$('#dataTable1').DataTable({ buttons: ['copy', 'excel', 'pdf'] });
	}

	$('body').on('click','i[data-id]',function(e)
			{
				e.preventDefault();

				var no=$(this).data("id");
				var toks=$("input[name='_token']").val();

				$.ajax(
						{
							type:"POST",
							data:{id:no, _token:toks},
							@if(Route::current()->getName() == 'edit_event')
							url:"{{ route('dynamic_assessement_weight_edit') }}",
							@else
							url:"{{ route('dynamic_assessement_weight_edit') }}",
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

/*
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

	$('body').on('click','button.edit_staff',(function(e)
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
