@extends('layouts.dash_layout')

@section('content')
	<div class="content-box">
		<div class="row">
			<div class="col-sm-12">
				<div class="element-wrapper">
					<h6 class="element-header">
						Create New User
					</h6>
					<div class="element-content">
						<div class="row">
                            <div class="col-md-12 col-lg-12">
							    <div class="element-wrapper">
								<div class="element-box">
									<form id="formValidate"  >
										@csrf
										<fieldset class="form-group">
											<legend><span>Personal Information</span></legend>
											<div id="container" class="form-group" style="margin-top: 20px">
												<div id="staff-container"> </div>
												<input id="staff_pic" type="file" name="staff_pic" /><br/>
												<span style="font-size: 13px; color:darkslategrey">Select a Staff Image.Only JPEG, PNG &amp; GIF formats.  Image should not be larger than 300 KB</span>
											</div>

											<div class="row">
												<div class="col-sm-12 col-md-12 col-lg-12">
													<div class="form-group">
														<label for="designation_id">Title</label>
														<select class="form-control" id="title_id"  name="title_id">
															<option value="" selected >Select Title</option>
															@if(!$title_collection->isEmpty())
																@foreach($title_collection as $val)
																	<option value="{{ $val->title_id }}">{{ $val->title_name }}</option>
																@endforeach
															@endif
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for=""> First Name</label><input value="{!! old('firstname') !!}" autocomplete="off" name="firstname" class="form-control" data-error="Please input your First Name" placeholder="First Name" required="required" type="text">
														<div class="help-block form-text with-errors form-control-feedback"></div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="">Last Name</label><input value="{!! old('lastname') !!}" autocomplete="off" name="lastname" class="form-control" data-error="Please input your Last Name" placeholder="Last Name" required="required" type="text">
														<div class="help-block form-text with-errors form-control-feedback"></div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12 col-md-12 col-lg-12">
													<div class="form-group">
														<label for="gender">Gender</label>
														<select class="form-control" id="gender"  name="gender">
															<option value="" selected >Select Gender</option>
															<option value="1">Male</option>
															<option value="2">Female</option>
														</select>
													</div>
												</div>
											</div>
										</fieldset>



										<fieldset class="form-group">
											<legend><span>User Access, Views & Privileges</span></legend>
											@if($god_eye)
											{{--<div class="form-check">
												<label class="form-check-label"><input name="god_eye" class="form-check-input" type="checkbox">Make Global Admin</label>
											</div>
											<br/>--}}
											@endif

											<div class="row">
												<div class="col-sm-12 col-md-12 col-lg-12">
													<div class="form-group">
														<label for="designation_id">User Designation</label>
														<select class="form-control" id="designation_id"  name="designation_id">
															<option value="" selected >Select Designation</option>
															@if(!$designation_collection->isEmpty())
																@foreach($designation_collection as $val)
																	<option value="{{ $val->designation_id }}">{{ $val->designation }}</option>
																@endforeach
															@endif
														</select>
													</div>
												</div>
											</div>


											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="rights_id">User Rights</label>
														<select class="form-control" id="rights_id"  name="rights_id">
															<option value="" selected >Select Rights</option>
															@if(!$rights_collection->isEmpty())
																@foreach($rights_collection as $val)
																	<option value="{{ $val->rights_id }}">{{ $val->rights_name }}</option>
																@endforeach
															@endif
														</select>
														<span style="font-size: 13px;color:darkslategrey">Assign default privileges to User. Default privileges can still be modified before creating User</span>
													</div>
												</div>
                                                <style>
                                                    .label-success {
                                                        background-color: #5cb85c;
                                                        color: #ffffff !important;
                                                    }
                                                    .label-danger {
                                                        background-color: #d9534f;
                                                        color: #ffffff !important;
                                                    }
                                                </style>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="email">
															Email address <span class="symbol required"></span>
														</label>

														<input value="{!! old('email') !!}" autocomplete="off" class="form-control underline" id="email" placeholder="Enter Email Address" type="text" name="email">
														<div class="help-block form-text with-errors user_feedback form-control-feedback">No Email specified</div>
													</div>
												</div>
											</div>

											<div class="row faculty" style="display: none">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="rights_id">Faculty</label>
														<select class="form-control" id="faculty_id"  name="faculty_id">
															<option value="" selected >Select Faculty</option>
															@if(!$faculty_collection->isEmpty())
																@foreach($faculty_collection as $val)
																	<option value="{{ $val->faculty_id }}">{{ $val->faculty_name }}</option>
																@endforeach
															@endif
														</select>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="department_id">Department</label>
														<select class="form-control" id="department_id"  name="department_id">
															<option value="" selected >Select Department</option>
														</select>
													</div>
												</div>
											</div>
										</fieldset>

										<style>
											input.hidden{
												display:none !important;
											}
										</style>


										<div id="here">

										</div>
										@if(!$rights_collection->isEmpty()  )
											<div class="form-buttons-w">
												<button style="cursor: pointer" class="btn btn-lg btn-danger create_staff" type="submit"> Submit</button>
											</div>
										@endif
									</form>
								</div>
							</div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional_js')
	<script src="{{asset('bower_components/bootstrap-checkbox/bootstrap-checkbox.js')}}"></script>
	<script src="{{asset('bower_components/jquery-simple-tree.js')}}"></script>
	<script>
		$(document).ready(function() {
			//$('#basic').simpleTree();

			$('input[data-sub]').on('click',function(e)
			{
				var whr=$(this).data('sub');

				if($(this).is(":checked")){
					$("input[data-suber="+whr+"]").prop("checked", true);
				}else{
					$("input[data-suber="+whr+"]").removeAttr("checked");
				}
			});


			$('input[data-suber]').click(function(e)
			{
				var whr=$(this).data('suber');

				if($(this).is(":checked")){
					$("input[data-sub="+whr+"]").prop("checked", true);
				}
				else
				{

					if($("input[data-suber="+whr+"]:checked").length==0)
					{
						$("input[data-sub="+whr+"]").removeAttr("checked");
					}

				}
			});
		});

		$('body').on('change','select#rights_id',function(){
			var right = $(this).val();
			if(right==4 || right==5 || right==6)
				$('div.faculty').slideDown();
			else
				$('div.faculty').slideUp();
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

		$('body').on('click','.nav-tabs > li a',function(){
			$('.nav-tabs > li').removeClass('attention');
			$(this).parent('li').addClass('attention');
		});

		//user pic and other uploads manipulation
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


		//all resets
		$('form#formValidate')[0].reset();
		$('select').val("");
		$("input[type=checkbox]").removeAttr("checked");
		$("input.views:first").prop("checked",true);

		//check and uncheck functionality for views
		$('input.views').on('click',function(e)
		{
			if($(this).is(":checked"))
			{
				$("input.views").not(this).removeAttr("checked");
				//$(this).prop("checked",true);
			}
		});

		//Email
		$('form').on('keyup','input#email',function(e)
				{
					var val=$.trim($(this).val());
					var toks=$("input[name='_token']").val();

					if(val!="" && val.length>3)
					{
						$.ajax(
								{
									type:"POST",
									data:{email:val,
										_token:toks
									},
									url:"{{route('username_check')}}",
									beforeSend:function()
									{
										$('div.user_feedback').html("...checking <img src='{{asset('_img/loading.gif')}}'/> ");
									},
									success: function(r)
									{
										if(r=="exists")
										{
											$('div.user_feedback').removeClass("label-inverse").removeClass("label-success").addClass("label-danger");
											$('div.user_feedback').html("...Already taken <i style='color:white' class='fa fa-times-circle'></i> ");
										}
										else if(r=="available")
										{
											$('div.user_feedback').removeClass("label-inverse").removeClass("label-danger").addClass("label-success").html("Email Available <i style='color:white' class='fa fa-check-circle'></i>");
										}
									}
								}

						);
					}else{
						$('div.user_feedback').removeClass("label-success").removeClass("label-danger").addClass("label-inverse").html("Email must be more than 3 characters");
					}
				}
		);

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

		//not("[name='username']")

		$('form#formValidate').on('click','button.create_staff',(function(e)
		{
			e.preventDefault();

			var formData = new FormData($('form#formValidate')[0]);

			var isUsernameClear=!$('div.user_feedback').hasClass("label-success");
			var rights = $('select#rights_id').val();
			var faculty = $.trim($('select#faculty_id').val());
			var department = $.trim($('select#department_id').val());
			//var main_menu=$('input[data-main]:checked').length;

			if(isUsernameClear)
			{
				sweetAlert("Oops...", "Kindly fix Email Error", "error");
			}
			else if((rights==4 || rights==5 || rights==6) && (faculty=='' || department=='') )
			{
				sweetAlert("Oops...", "You must select a faculty or department", "error");
			}
			else
			{
				$.ajax(
						{
							type:"POST",
							data:formData,
							url:"{{route('save_user')}}",
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
								swal("success!", "New User Created.", "success");
							}

						}

				);
			}






		}));

	</script>
@endsection