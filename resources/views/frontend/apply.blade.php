@extends('../layouts.frontend')

@section('title-name')
Applications at IAUE Distance Learning Portal
@endsection

@section('required_css')
    <link rel="stylesheet" href="{{asset("bower_components/bootstrap-daterangepicker.css")}}" />
@endsection

<style>
    .header-holder.sticky .main-navigation.navbar-right > li > a {
        color:white !important;
    }
</style>
@section('content')
        <!-- heading banner -->
        <header class="heading-banner text-white bgCover" style="padding:5px;background-image: url({{asset("_img/applications.jpg")}}); background-size: cover; background-repeat: no-repeat">
            <div class="container holder">
                {{--<div class="align">
                    <h1>Applications</h1>
                </div>--}}
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li class="active">Apply for Programmes</li>
                </ol>
            </div>
        </nav>

        <div id="two-columns" class="container">
            <div class="row">
                <!-- content -->
                <section id="content" class="col-xs-12 col-md-12" style="padding-top: 10px">
                    @auth
                    <div class="container" style="text-align: center;">
                        @if(Auth::user()->user_type==2)
                            <img style="width:100px; height:100px" src="{{asset("_img/barred.png")}}" alt=""><br/>
                            <h3>You may not apply for admission with your staff account!</h3>
                        @elseif(isset($open_application_check_collection) && !$open_application_check_collection->isEmpty())
                            <img style="width:100px; height:100px" src="{{asset("_img/barred.png")}}" alt=""><br/>
                            <h3>You have active applications. Multiple applications are not allowed</h3>
                        @else
                        <form class="well form-horizontal" action="{{route("apply_submit")}}" method="post" enctype="multipart/form-data"  id="apply_form">
                            @csrf
                            <fieldset>
                                <img style="width:90px; height: 90px" src="{{asset("_img/apply.png")}}" alt=""><br/>
                                <legend><h2><b>Application Form</b></h2></legend><br>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Programme Type</label>
                                    <div class="col-md-4 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <select autocomplete="off" name="program_type_id" id="program_type_id" class="form-control selectpicker">
                                                <option value="">Select Programme Type</option>
                                                @if(!$programme_type_collection->isEmpty() )
                                                    @foreach($programme_type_collection as $val)
                                                        <option
                                                               @if(isset($programme_collection)  &&!$programme_collection->isEmpty() && $programme_collection[0]->programme_type_id==$val->program_type_id)
                                                                 {{"selected"}}
                                                               @endif
                                                                value="{{$val->program_type_id}}">{{$val->program_type_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Programme</label>
                                    <div class="col-md-4 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <select autocomplete="off" name="programme_id" id="programme_id" class="form-control selectpicker">
                                                <option value="">Select Programme</option>
                                                @if(isset($programme_collection)  && !$programme_collection->isEmpty())
                                                    <option value="{{$programme_collection[0]->programme_id}}" selected>{{$programme_collection[0]->degree_short_name." , ".$programme_collection[0]->name}}{!! $programme_collection[0]->university_id?" <span style='text-transform:uppercase; font-size:19px;'>(".$programme_collection[0]->university.")</span>":"" !!}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Entry Type</label>
                                    <div class="col-md-4 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <select autocomplete="off" id="entry_type" name="entry_type" class="form-control selectpicker">
                                                <option value="">Select Entry Type</option>
                                                <option value="1">Regular Entry</option>
                                                <option value="2">Direct Entry</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Birth Certificate</label>
                                    <div class="col-md-4 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                            <input type="file" name="birth_certificate"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group cross_border">
                                    <label class="col-md-4 control-label">International Passport</label>
                                    <div class="col-md-4 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                            <input type="file" name="international_passport"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group distance_learning">
                                    <label class="col-md-4 control-label">National Identity Card</label>
                                    <div class="col-md-4 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                            <input type="file" name="national_id"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group distance_learning jamb">
                                    <label class="col-md-4 control-label">Jamb Result</label>
                                    <div class="col-md-4 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                            <input type="file" name="jamb"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group distance_learning">
                                    <label class="col-md-4 control-label">WAEC Result</label>
                                    <div class="col-md-4 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                            <input type="file" name="waec"/>
                                        </div>
                                    </div>
                                </div>


                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4"><br>
                                        <button type="submit" class="btn btn-danger send_apply" style="width:250px; padding:5px" >SUBMIT APPLICATION <span class="glyphicon glyphicon-send"></span></button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                        @endif
                    </div>
                    @else
                        <div class="container log_me_in" style="text-align: center;@if(Session::get('register_error_apply')){{"display:none"}}@endif">
                            <img style="width:90px; height: 90px" src="{{asset("_img/login.png")}}" alt="">
                            <h2><b>Login</b></h2><br>
                            @if(Session::get('login_error_apply'))
                                <span style="color:orangered">Your credentials are invalid</span>
                            @elseif(Session::get('registration_success'))
                                <span class="label label-success" style="">Account creation successful. Login to your email to activate your account</span>
                                <br style="clear: both"/><br/>
                            @endif
                            <form action={{route("attempt_login_apply")}} method="post" class="well form-horizontal log_me_in">
                                <input name="from_apply" value="yep" type="hidden">
                                <fieldset>
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email Address</label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                <input autocomplete="off" value="@if(Session::get('login_error_apply')){{Session::get('login_error')}}@endif" required name="apply_email" placeholder="Enter email address" class="form-control"  type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" >Password</label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input required name="apply_password" placeholder="Enter Password" class="form-control" placeholder="Enter Password"  type="password">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-4"><br>
                                            <button type="submit" class="btn btn-danger" style="width:250px; padding:5px" >LOGIN<span class="glyphicon glyphicon-send"></span></button>
                                        </div>
                                    </div>
                                    <p>Don't have an account? <span style="cursor: pointer" class="label label-success show_register">CREATE ACCOUNT</span></p>

                                </fieldset>
                            </form>
                        </div>
                        <div class="container reg_me" style="text-align: center; @if(Session::get('register_error_apply'))@else {{"display:none"}} @endif">
                            <img style="width:90px; height: 90px" src="{{asset("_img/register.png")}}" alt="">
                            <h2><b>CREATE IAUE ACCOUNT</b></h2><br>
                            @if(Session::get('register_error_apply'))
                                <span style="color:orangered">There were errors in your registration</span>
                            @endif
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" style="margin-top:3px; margin-bottom:0">
                                        {{$error}}
                                    </div>
                                @endforeach
                                <br/><br/>
                            @endif
                            <form action={{route("attempt_register")}} method="post" class="well form-horizontal reg_me">
                                <input name="from_apply" value="" type="hidden">
                                <fieldset>
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Title</label>
                                        <div class="col-md-4 selectContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                                <select autocomplete="off" name="title_id" id="title_id" class="form-control selectpicker">
                                                    <option value="" selected>Select Title</option>
                                                    @if(isset($title_collection)  && !$title_collection->isEmpty())
                                                        @foreach($title_collection as $title_col)
                                                        <option value="{{$title_col->title_id}}">{{$title_col->title_name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">First Name <span style="color: red">*</span></label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input autocomplete="off" value="{{old('firstname')}}" required name="firstname" placeholder="Enter Firstname" class="form-control"  type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Middle Name</label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input autocomplete="off" value="{{old('middlename')}}" name="middlename" placeholder="Enter Middle Name" class="form-control"  type="text">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Surname/Family Name <span style="color: red">*</span></label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input autocomplete="off" value="{{old('lastname')}}" required name="lastname" placeholder="Enter Lastname" class="form-control"  type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Gender</label>
                                        <div class="col-md-4 selectContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <select autocomplete="off" name="gender" id="gender" class="form-control selectpicker">
                                                    <option value="" selected>Select Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Phone No. <span style="color: red">*</span></label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                                <input autocomplete="off" value="{{old('phone')}}" required name="phone" placeholder="Enter Phone e.g 09003456785" class="form-control"  type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date of Birth <span style="color: red">*</span></label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
                                                <input autocomplete="off" value="{{old('dob')}}" required name="dob" placeholder="Enter DOB e.g 1993-12-31" class="form-control"  type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email <span style="color: red">*</span></label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                <input autocomplete="off" value="{{old('reg_email')}}" required name="reg_email" placeholder="Enter Email e.g johndoe@ymail.com" class="form-control"  type="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Confirm Email <span style="color: red">*</span></label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                <input value="{{old('confirm_email')}}" required name="confirm_email" placeholder="Confirm Email" class="form-control"  type="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Password <span style="color: red">*</span></label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input placeholder="Enter Password" required name="reg_password" class="form-control"  type="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Confirm Password <span style="color: red">*</span></label>
                                        <div class="col-md-4 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input placeholder="Confirm Password" required name="confirm_password" class="form-control"  type="password">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-4"><br>
                                            <button type="submit" class="btn btn-danger" style="width:250px; padding:5px" >CREATE ACCOUNT<span class="glyphicon glyphicon-send"></span></button>
                                        </div>
                                    </div>
                                    <p>Have an account already? <span style="cursor: pointer" class="label label-info show_login">LOGIN</span></p>

                                </fieldset>
                            </form>
                        </div>
                     @endauth
          <!-- /.container -->
                </section>
            </div>
        </div>
@endsection


@section('additional_js')
    <script src="{{asset('bower_components/jquery.blockUI.js')}}"></script>
    <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script>

        @if(isset($programme_collection) && !$programme_collection->isEmpty())
                @if($programme_collection[0]->programme_type_id==1)
                $("div.cross_border").slideDown();
                $("div.distance_learning").slideUp();
                @else
                $("div.cross_border").slideUp();
                $("div.distance_learning").slideDown();
                @endif
        @endif

                $('input[name="dob"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1920,
                    autoUpdateInput: false
                });
        $('input[name="dob"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });

        $('body').on('change','select#program_type_id',(function(e)
        {
            if($(this).val()==1) {
                $("div.cross_border").slideDown();
                $("div.distance_learning").slideUp();
            }else{
                $("div.cross_border").slideUp();
                $("div.distance_learning").slideDown();
            }
        }));

        $('body').on('change','select#entry_type',function(e){
            e.preventDefault();
            if($(this).val()==2)
            {
                $("div.jamb").slideUp();
            }
            else if($(this).val()==1){
                $("div.jamb").slideDown(); 
            }
            
        });

        $('form#apply_form').on('change','select#program_type_id',(function(e)
        {
            var id=$.trim($(this).val());
            if(id!=""){
                $.ajax(
                    {
                        type:"POST",
                        data:{id,
                            _token:$("input[name='_token']").val()
                        },
                        url:"{{route('get_programmes_for_types_apply')}}",
                        beforeSend:function()
                        {
                            $('body').block({ message: "fetching programmes" });
                        },
                        success: function(r)
                        {
                            $('body').unblock();
                            if(r!="")
                            {
                                $('select#programme_id').html(r);
                            }

                        }
                    }
                );
            }

        }));

        $('body').on('click','span.show_register,span.show_login',(function(e)
        {
            if($(this).hasClass("show_register")) {
                $('div.log_me_in').slideUp();
                $('div.reg_me').slideDown();
            }else{
                $('div.log_me_in').slideDown();
                $('div.reg_me').slideUp();
            }
        }));

        $('body').on('click','button.send_apply',(function(e)
        {
            e.preventDefault();
            var program_type_id=$.trim($("select#program_type_id").val());
            var program_id=$.trim($("select#programme_id").val());
            var entry_type=$.trim($("select#entry_type").val());
            var allowExt=['jpg','jpeg','pdf','png','JPEG','JPG','PNG','PDF'];
            var count=0;
            if(program_type_id && program_id && entry_type){
               $("input[type='file']:visible").each(function(){
                   $this=$(this);
                   if($.trim($this.val())==""){
                       vex.dialog.alert({
                           message: `The file type ${$this.attr('name')} is mandatory`
                       });
                       count++;
                   }
                   else if(!allowExt.includes($this.val().split('.')[1])){
                       vex.dialog.alert({
                           message: `The file type ${$this.attr('name')} doesn't meet file upload type requirements. Only pdfs and image formats allowed`
                       });
                       count++
                   }
               })

                if(count==0){
                    $("form#apply_form").submit()
                }

            }else{
                vex.dialog.alert({
                    message: 'Programme Type, Programme and Entry Type field are required'
                });
            }

        }));
    </script>
@endsection
