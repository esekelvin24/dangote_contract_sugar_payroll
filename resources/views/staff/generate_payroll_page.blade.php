@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')

@php
    
@endphp


<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container-fluid">

        <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">New Payroll Entry</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/user-list">Departmental Monthly Payroll</a></li>
                    <li class="active"><span>New Payroll Entry</span></li>
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
                                            <form  method="POST" action="{{url("/payroll-generation/save")}}">

                                                @csrf
                                                <div class="form-body">
                                                   
                                                    <div class="row">
                                                        <!--/span-->

                                                        <div style="max-width:210px !important;" class="col-md-6">
                                                                <div class="form-group @error('staff_type') has-error @enderror">
                                                                    <span class="txt-danger" style="font-size:19px;">*</span>    <label class="control-label mb-10 text-left">Staff Type</label>
                                                                    <select onchange="do_this()" required id="staff_type" name="staff_type" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                           <option value="">Choose a staff type</option> 
                                                                        @if(count($staff_type_list) > 0) 
                                                                           @foreach($staff_type_list as $type) 
                                                                              <option value="{{$type->staff_type_id}}">{{$type->staff_type_name}}</option>
                                                                           @endforeach
                                                                        @endif
                                                                    </select>
                                                                    @error('department_id')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div style="max-width:210px !important;" class="col-md-6">
                                                                    <div class="form-group @error('new_date') has-error @enderror">
                                                                        <label class="control-label mb-10">Month and Year</label>
                                                                        <input autocomplete="off" type="text" id="new_date" name="new_date" class="form-control"  placeholder="Enter the month" required autofocus>
                                                                        @error('new_date')
                                                                            <span class="help-block" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                 

                                                         <!--/span-->
                                                         <div style="max-width:210px !important;" class="col-md-6">
                                                                <div class="form-group @error('department_id') has-error @enderror">
    
                                                                    <span class="txt-danger" style="font-size:19px;">*</span><label class="control-label mb-10 text-left">Department</label>
                                                                    
                                                                        <select required id="department_id" name="department_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                          
                                                                        </select>
                                                                    @error('department_id')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                         </div>
                                                        
                                                           
                                                       
                                                    

                                                            
                                                            <div style="max-width:185px !important;" class="col-md-6">
                                                                <div class="form-group @error('password') has-error @enderror">
                                                                    <label class="control-label mb-10"><br/><br/><br/></label>
                                                                    <button type="submit" class="btn btn-info">
                                                                        {{ __('Create') }}
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
</div>
           
<script>
    var SITEURL = '{{URL::to('')}}';
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
           var sel_type = $('#staff_type').val();

                   if (sel_type=="")
                   {
                    $('#new_date').val("");
                        swal({ 
                            title: "Error",   
                            icon: "warning", 
                            text: "Select a staff type",
                            confirmButtonColor: "#469408",   
                        }).then((value) => {

                            

                        });
                   }else
                   {
                    $.ajax({
                        type:'POST',
                        url: SITEURL+'/payroll-generation/get-avail-dept',
                        data:{sel_date:sel_date, sel_type:sel_type},
                        success:function(response){
                         // alert(response);
                            $("#department_id").html(response);

                        }

                    });
                   }
                   
    
              });


            });


           

            function do_this()
            {
                $('#new_date').val('');
                $('#department_id').html('');
                
            }


            @if(Session::get('success'))
                swal({ 
                            title: "Successful",   
                            icon: "success", 
                            text: "{{Session::get('success')}}",
                            confirmButtonColor: "#469408",   
                        }).then((value) => {

                            

                        });
            @endif

            @if(Session::get('error'))
                swal({ 
                            title: "Error",   
                            icon: "warning", 
                            text: "{{Session::get('error')}}",
                            confirmButtonColor: "#469408",   
                        }).then((value) => {

                            

                        });
			@endif
</script>

@endsection 