@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')

@php
    $code = isset($code)?$code:"";
    $message = isset($message)?$message:"";
@endphp


<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container-fluid">

        <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Capture Weekly Time Sheet</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/user-list">User List</a></li>
                    <li class="active"><span>Capture Weekly Time Sheet</span></li>
                </ol>
                </div>
                <!-- /Breadcrumb -->
        </div>



        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                      <div  style="padding:10px;  border: 2px solid red; border-radius: 20px 10px;">
                         Duration : <strong>From</strong> {{$sheet_details[0]->started_at}} <strong>To</strong> {{$sheet_details[0]->expired_at}}
                         
                         <p style="right:35px; margin-top:-23px;  position:absolute ">Weekends Count: <strong>{{$no_of_weekends}}</strong>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Weekdays Count: <strong>{{$weekdays}}</strong></p>

                      </div>

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form  method="POST" action="{{URL::to('')}}/time-sheet-list/{{$sheet_id}}/save-timesheet-record">

                                                @csrf
                                                <div class="form-body">
                                                    
                                                    
                                                    <div class="row">


                                                     <table class="table table-responsive  table-striped">
                                                         <thead>
                                                        <tr>
                                                             <td>S/N</td>
                                                             <td>Staff ID</td>
                                                             <td>Name</td>
                                                             <td>Department</td>
                                                             <td>Staff Type</td>
                                                             <td align="center">Weekdays Present</td>
                                                             <td align="center">Weekends Present</td>
                                                             <td align="center">Absent</td>
                                                             <td align="center">OT</td>
                                                         </tr>
                                                        </thead>
                                                        @php
                                                         $counter = 0;
                                                        @endphp
                                                        @if(count($staff_list) > 0)
                                                            @foreach ($staff_list as $staff)
                                                                @php
                                                                    $counter = $counter + 1;
                                                                @endphp
                                                              <tr>
                                                              <td>{{$counter}}</td>
                                                              <td>{{$staff->staff_id}}</td>
                                                                    <td>{{$staff->first_name." ".$staff->other_name." ".$staff->last_name}}</td>
                                                                    <td>{{$staff->department_name}}</td>
                                                                    <td>{{$staff->staff_type_name}}</td>
                                                                    <td align="center"><input value="{{$staff->numb_days==""?"0":$staff->numb_days}}" type="text" style="max-width:50px" id="numb_days[{{$staff->staff_id}}]" name="numb_days[{{$staff->staff_id}}]"  class=""  placeholder="" required autofocus></td>
                                                                    <td align="center"><input value="{{$staff->weekends==""?"0":$staff->weekends}}" type="text" style="max-width:50px" id="weekends[{{$staff->staff_id}}]" name="weekends[{{$staff->staff_id}}]"  class=""  placeholder="" required autofocus></td>
                                                                    <td align="center"><input readonly value="{{$staff->absent==""?"0":$staff->absent}}" type="text" style="max-width:50px" id="absent[{{$staff->staff_id}}]" name="absent[{{$staff->staff_id}}]"    class=""  placeholder="" required autofocus></td>
                                                                    <td align="center"><input value="{{$staff->ot==""?"0":$staff->ot}}" type="text" style="max-width:50px" id="ot[{{$staff->staff_id}}]" name="ot[{{$staff->staff_id}}]"      class=""  placeholder="" required autofocus></td>
                                                                   <!-- <td align="center"><input value="0" type="text" style="max-width:50px" id="{{$staff->staff_id}}_absent"     name="{{$staff->staff_id}}_numb_days" class="form-control"  placeholder="" required autofocus></td>
                                                                    <td align="center"><input value="0" type="text" style="max-width:50px" id="{{$staff->staff_id}}_ot"         name="{{$staff->staff_id}}_numb_days" class="form-control"  placeholder="" required autofocus></td>-->
                                                              
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                     </table>


                                                            

                                                              
                                                       
                                                                   
        
                                                                      

                                                                     
                                                    </div>

                                                   
                                                    

                                                        
                                                    

                                                 
                                                    <hr class="light-grey-hr">    
                                                    
                                                        
                                                    <div align="center" class="form-actions mt-10">
                                                        <button type="submit" class="btn btn-info">
                                                                {{ __('Save') }}
                                                            </button>
                                                       
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
    var SITEURL = '{{URL::to('')}}';
$( document ).ready(function() {

 var myCalendar;
	    myCalendar = new dhtmlXCalendarObject(["start_range", "end_range"]);
       // myCalendar.showWeekNumbers();
        myCalendar.setWeekStartDay(7);
        myCalendar.hideWeekNumbers

            });

function get_section(value)
{
   
            




$.ajax({


headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
   type:'GET',
   url: SITEURL + '/section-list/'+value,
   
   success:function(response){
    //alert(response);
    $('#section_id').html(response);
   }

});
   
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

        

            //closeMe();
            function closeMe()
            {
                window.opener = self;
                window.close();
            }






</script>



@endsection 