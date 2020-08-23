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
                <h5 class="txt-dark">Payroll Data Entry</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/user-list">User List</a></li>
                    <li class="active"><span>Payroll Data Entry</span></li>
                </ol>
                </div>
                <!-- /Breadcrumb -->
        </div>



        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">

                    @php
                            $pay_day = DB::table('parameter')->where('parameter_name','pay_day')->first()->parameter_value;
                            $end = date('Y-m-'.$pay_day, strtotime($payroll_month));
                            $start = date("Y-m-d", strtotime("-1 month +1 day", strtotime($end)));
                    @endphp
                         
                    <div  style="padding:10px;  border: 2px solid red; border-radius: 20px 10px;">
                         Duration : <strong>From</strong> {{$start}} <strong>To</strong> {{$end}}
                         
                         <p style="right:35px; margin-top:-23px;  position:absolute "> Weekends: <strong> {{$weekends}}  </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Weekdays: <strong>{{$working_days}}</strong></p>

                      </div>

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form  method="POST" action="{{URL::to('')}}/payroll-list/save-payroll-staff-record/{{$sheet_id}}">

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
                                                             <td>Working Days</td>
                                                             <td align="center">Present days</td>
                                                             <td align="center">Weekends</td>
                                                             <td align="center">Absent days</td>
                                                             <td align="center">OT(hrs)</td>
                                                             <td align="center">Arrears(Amount)</td>
                                                             <td align="center">Advance(Amount)</td>
                                                             
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
                                                              <td align="center">{{$working_days}}</td>
                                                              <td align="center">{{$present[$staff->staff_id]}}</td>
                                                              <td align="center">{{$weekends_count[$staff->staff_id]}}</td>
                                                              <td align="center">{{$absent[$staff->staff_id]}}</td>
                                                              <td align="center">{{$ot[$staff->staff_id]}}</td>

                                                              <td align="center"><input value="{{$staff->arrears==""?0:$staff->arrears}}" type="text" style="max-width:50px" id="arrears[{{$staff->staff_id}}]" name="arrears[{{$staff->staff_id}}]"  class=""  placeholder="" required autofocus></td>
                                                              <td align="center"><input value="{{$staff->advance==""?0:$staff->advance}}" type="text" style="max-width:50px" id="advance[{{$staff->staff_id}}]" name="advance[{{$staff->staff_id}}]"    class=""  placeholder="" required autofocus></td>
                                                                    
                                                                   
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

            
          
           

        

            //closeMe();
            function closeMe()
            {
                window.opener = self;
                window.close();
            }






</script>



@endsection 