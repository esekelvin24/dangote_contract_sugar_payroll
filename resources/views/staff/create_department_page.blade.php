@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container-fluid">

        <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">New Department</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/department-list">Department List</a></li>
                    <li class="active"><span>New Department</span></li>
                </ol>
                </div>
                <!-- /Breadcrumb -->
        </div>



        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form  method="POST" action="{{url("/department-list/save")}}">

                                                @csrf
                                                <div class="form-body">
                                                <input type="hidden" id="op" name="op" value="{{$op}}" />
                                                <input type="hidden" id="dep_id" name="dep_id" value="{{$dep_id}}" />
                                                    <div class="row">
                                                            <div style="max-width:250px !important;" class="col-md-6">
                                                                    <div class="form-group @error('new_date') has-error @enderror">
                                                                        <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10">Department Name</label>
                                                                    <input value="{{$department_name==""?"":$department_name}}" type="text" id="department_name" name="department_name" class="form-control"  placeholder="Enter the department name" required autofocus>
                                                                        @error('new_date')
                                                                            <span class="help-block" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                         <!--/span-->
                                                        
                                                        
                                                       
                                                    

                                                            
                                                            <div style="max-width:185px !important;" class="col-md-6">
                                                                <div class="form-group @error('password') has-error @enderror">
                                                                    <label class="control-label mb-10"><br/><br/><br/></label>
                                                                    <button type="submit" class="btn btn-info">
                                                                        {{ $op=="update"?"Update":"Create" }}
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            
                                                            
                                                        </div>
                                                        <!-- /Row -->


                                                </div>
                                    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>		
                </div>
            </div>
           
<script>
$( document ).ready(function() {

 var myCalendar;
	    myCalendar = new dhtmlXCalendarObject(["new_date"]);
        myCalendar.showWeekNumbers();
       // myCalendar.hideWeekNumbers();
       
        myCalendar.disableDays("month", [2,3,4,5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]);
        

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           myCalendar.attachEvent("onClick", function(date){
           var sel_date =  $('#new_date').val();

                   
                    $.ajax({
                        type:'POST',
                        url:'/payroll-generation/get-avail-dept',
                        data:{sel_date:sel_date},
                        success:function(response){
                         // alert(response);
                            $("#department_id").html(response);

                        }

                    });
    
              });


            });


            if ("{{$code}}" == "200")
            {
                  swal({ 
                        title: "Successful",   
                        icon: "success", 
                        text: "{{$message}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        

                    });

                
            }else if ("{{$code}}" != "200" && "{{$code}}" != "none")
            {
                swal({ 
                        title: "Error",   
                        icon: "warning", 
                        text: "{{$message}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        

                    });

            }
</script>

@endsection 