@extends('../layouts.dash_layout')

@section('required_css')
@endsection


@section('content')
    <style>
        .new_active{
          background-color: #1f1d5e !important;
        }
        .new_active a{
            color:white !important;
            text-decoration: none;
        }
        input.hidden{
            display:none !important;
        }
        .nav{
            display: block !important;
        }
        .tabs-left > .nav-tabs > li{
            min-width: 200px;
        }
    </style>
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
		            <form id="form" enctype="multipart/form-data" method="post"  role="form">
			@csrf
			       <div>
	                   <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="rights_name">
										Rights Name <span class="symbol required font"></span>
									</label>
									<input required value="" autocomplete="off" class="form-control underline" id="rights_name" placeholder="Enter User" type="text" name="rights_name">
									<span class="text-danger error-message"></span>
								</div>
							</div>
						   
						   
						</div>
					   
				<div class="tabbable tabs-left">

								<ul id="myTab4" class="nav nav-tabs">
								<?php
									for($a=0;$a<count($rights_main_tab_id);$a++)
									{
								?>
									<li class="<?php echo $a==0?"new_active":"" ?>">
										<a href="#a<?php echo $rights_main_tab_id[$a] ?>" data-toggle="tab" aria-expanded="<?php echo $a==0?"true":"false" ?>">
											<?php echo strtoupper($rights_main_tab_name[$a]) ?>
										</a>
									</li>
									<?php
									}
									 ?>											
								</ul>
								<?php
								$checkbox_colours=array("primary", "success", "warning","danger","info","purple");
								?>

								<div class="tab-content">
									<?php
									for($a=0;$a<count($rights_main_tab_id);$a++)
									{

									 ?>
									<div class="tab-pane fade <?php echo $a==0?"active in":"" ?>" id="a<?php echo $rights_main_tab_id[$a] ?>">

											<div class="checkbox">
											<input autocomplete="off" data-main="<?php echo $rights_main_tab_id[$a] ?>" name="main[]" value="<?php echo $rights_main_tab_id[$a] ?>" type="checkbox"/>
											</div>

											<?php
											for($b=0;$b<count($rights_sub_tab_id);$b++)
											{
												$color=$checkbox_colours[rand(0,5)];
												if($rights_main_sub_tab_id[$b]==$rights_main_tab_id[$a])
												{
											?>
											<div class="checkbox clip-check check-<?php echo $color ?>">
												<input autocomplete="off"  data-sub="<?php echo $rights_sub_tab_id[$b] ?>" disabled id="c<?php echo $rights_sub_tab_id[$b] ?>" name="sub[]" value="<?php echo $rights_sub_tab_id[$b] ?>"  type="checkbox">
												<label for="c<?php echo $rights_sub_tab_id[$b] ?>">

													<?php 
													echo $rights_sub_tab_url[$b]=="#"?strtoupper($rights_sub_tab_name[$b]):"$rights_sub_tab_name[$b]";
													?>
												</label>
											</div>
											  <?php
													/*if($rights_sub_tab_url[$b]=="#")
													{
														for($c=0;$c<count($rights_suber_tab_id);$c++)
														{
															$color=$checkbox_colours[rand(0,5)];
													if($rights_sub_tab_id[$b]==$rights_sub_suber_tab_id[$c])
															{
												*/?><!--
														<div style="margin-left: 35px" class="checkbox clip-check check-<?php /*echo $color */?>">
														<input autocomplete="off"  data-suber="<?php /*echo $rights_sub_suber_tab_id[$c] */?>" disabled id="d<?php /*echo $rights_suber_tab_id[$c] */?>" name="suber[]" value="<?php /*echo $rights_suber_tab_id[$c] */?>"  type="checkbox">
														<label for="d<?php /*echo $rights_suber_tab_id[$c] */?>">

															<?php /*
															echo $rights_suber_tab_name[$c];
															*/?>
														</label>
														</div>
												--><?php
/*															}
														}
													}
													*/?>

											<?php
											}
											}
											?>





									</div>
									<?php
									 }
										?>


								</div>
							</div>

				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary btn-block btn-scroll btn-scroll-left ti-book create" type="button"><span>CREATE NEW USER RIGHTS</span></button>
					</div>
			   </div>

                		
		
                <span class="clearfix"></span>

               </div>
		
   
</form>
            </div>
        </div>
    </div>
						

@endsection

@section('required_js')
<script src="{{asset('bower_components/bootstrap-checkbox/bootstrap-checkbox.js')}}"></script>
@endsection

@section('additional_js')
    <script>
        $("input[type=checkbox]").removeAttr("checked");
        $('body').on('click','.tabs-left > .nav-tabs > li',function(){
            $('.tabs-left > .nav-tabs > li').removeClass('new_active');
            $(this).addClass('new_active');
        });



				$('input[data-main]').checkboxpicker({
				  html: true,
				  offLabel: '<span class="icon-close">',
				  onLabel: '<span class="icon-check">'
				}).on('change', function(e) {
				 if($(this).is(":checked"))
				 {
					 var under="a"+$(this).data('main');
					 $("div#"+under+" input[name^=sub]").removeAttr("disabled");
                     $('input[data-main]').removeAttr("disabled");
				 }
				else
				 {
					 var under="a"+$(this).data('main');
					 $("div#"+under+" input[name^=sub]").prop("disabled", true).removeAttr("checked");
					 $('input.hidden').removeAttr("disabled");

				 }
				});

				
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
					}else{
					
						if($("input[data-suber="+whr+"]:checked").length==0)
						{
						$("input[data-sub="+whr+"]").removeAttr("checked");	
						}
						
					}
				});
					
		
		$('form#form').on('click','button.create',(function(e)
		{
			e.preventDefault();

			var formData = new FormData($('form#form')[0]);
			var name=$.trim($('input[name=rights_name]').val());
					    var main_menu=$('input[data-main]:checked').length;
				if(name=="")
                {
                    sweetAlert("Oops...", "Kindly enter name of new Right!", "error");
                }
				else if(main_menu==0){
                    sweetAlert("Oops...", "You must select at least one main right", "error");
                }
				else
				{	
		
				 $.ajax(
						 {
							 type:"POST",
							 data:formData,
							 url:"{{route('save_user_rights')}}",
							 cache:false,
							 contentType:false,
							 processData:false,
							 beforeSend:function()
							  {
								  $('form#form').block({ message: null }); 
							  },
							  error: function(r)
							  {
								$('form#form').unblock();

								 const errors = r.responseJSON.errors;
								 var first=true;		

								  //clear any previous errors
								  $('span.error-message').html('');
								  $('div.has-error').removeClass('has-error');


								  $.each(errors,function(index,value)
								  {	
								   $('#'+index).next('span.error-message').html(''+value);
								   $('#'+index).closest('div.form-group').addClass('has-error'); 
								   $('html, body').animate({scrollTop:$('#'+index).offset().top-90},2000);

								  })



							  },
							  success: function(r)
							  {							  
								 $('form#form').unblock(); 

								  //clear any previous errors
								  $('span.error-message').html('');
								  $('div.has-error').removeClass('has-error');
								  $('div.has-success').removeClass('has-success');
								  //clear all items
								
								 $('form#form')[0].reset();
	
								 $('html, body').animate({scrollTop:$('body').offset().top-90},2000);
								  swal("success!", "Successfully Created!", "success");
								 }

							  }

                        );
					}


		}));

	
	</script>
@endsection
