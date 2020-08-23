@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')

@php
$overtime ="";
$numb_days = "";
$absent = "";

 foreach($data as $staff_data)
{
        $overtime =$staff_data->overtime_hrs;
        $numb_days = $staff_data->days_worked;
        $absent = $default_working_days - $staff_data->days_worked;
       
}


@endphp

<style>
.txt-dark
{
    font-weight:bold;
}
</style>

<div class="container-fluid">

    <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Staff Payment Details</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                            <li><a href="index.html">Dashboard</a></li>
                            <li class="active"><span>Departmental Monthly Payroll</span></li>
                            <li class="active"><span>{{$department_name}}</span></li>
                            <li class="active"><span> {{$full_name}}</span></li>
                        </ol>
            </div>
            <!-- /Breadcrumb -->
    </div>



    
    		<!-- Row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <!-- <h6 class="panel-title txt-dark">Menu Table</h6> -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive border-3 border-secondary rounded">
                                     
                                        

                                        <div class="">
                                            <div class="col-md-12">
                                                <div class="panel panel-default card-view">
                                                    
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                            <span class="txt-dark head-font inline-block capitalize-font mb-5">Payroll ID:</span>
                                                                            <address class="mb-15">
                                                                                
                                                                               {{$payroll_id}} 
                                                                                
                                                                            </address>
                                                                </div>
                                                                <div class="col-xs-6 text-right">
                                                                        <span class="txt-dark head-font inline-block capitalize-font mb-5">Category Group ID:</span>
                                                                        <address class="mb-15">
                                                                            
                                                                           {{$staff_cat_id}} 
                                                                            
                                                                        </address>
                                                                </div>

                                                                <div class="col-xs-6">
                                                                    <span class="txt-dark head-font inline-block capitalize-font mb-5">Name:</span>
                                                                    <address class="mb-15">
                                                                        
                                                                       {{$full_name}}
                                                                        
                                                                    </address>
                                                                </div>
                                                                <div class="col-xs-6 text-right">
                                                                    <span class="txt-dark head-font inline-block capitalize-font mb-5">Month Of</span>
                                                                    <address class="mb-15">
                                                                        
                                                                       {{$month_of}}
                                                                    </address>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                  <span class="txt-dark head-font capitalize-font mb-5">Department</span>
                                                                    <address>
                                                                            {{$department_name}}
                                                                        
                                                                    </address>
                                                                </div>
                                                                <div class="col-xs-6 text-right">
                                                                    <address>
                                                                        <span class="txt-dark head-font capitalize-font mb-5">Designation</span><br>
                                                                        {{$designation_name}}
                                                                    </address>
                                                                </div>
                                                                  <br/>
                                                                <div class="col-xs-6 text-left">
                                                                    <address>
                                                                        <span class="txt-dark head-font capitalize-font mb-5">Days Worked</span><br>
                                                                        {{$numb_days}}
                                                                    </address>
                                                                </div>
                                                                
                                                                @if ($staff_type_id == 'ST01') {{-- display this for only temporary --}}
                                                                    <div class="col-xs-6 text-right">
                                                                        <address>
                                                                            <span class="txt-dark head-font capitalize-font mb-5">Absent Days</span><br>
                                                                            {{$absent}}
                                                                        </address>
                                                                    </div>
                                                                @else
                                                                    <div class="col-xs-6 text-right">
                                                                        <address>
                                                                            <span class="txt-dark head-font capitalize-font mb-5">&nbsp;</span><br>
                                                                            &nbsp;
                                                                        </address>
                                                                    </div>
                                                                @endif


                                                               
                                                                <div class="col-xs-6 text-left">
                                                                    <address>
                                                                        <span class="txt-dark head-font capitalize-font mb-5">Overtime Hours</span><br>
                                                                       {{$overtime}}
                                                                    </address>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="invoice-bill-table">
                                                                <div class="table-responsive">
                                                                    <table class="table ">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Description</th>
                                                                                <th>Type</th>
                                                                                <th>Amount</th>
                                                                               
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        @if(count($data) > 0)
                                                                        @php
                                                                            $total_addition= 0;
                                                                            $total_deduction = 0;
                                                                            $netpay = 0;
                                                                        @endphp
                                                                          @foreach($data as $staff_data)
                                                                          
                                                                             <tr>
                                                                                 @php
                                                                                 if ($staff_data->payment_type == "Addition")
                                                                                 {
                                                                                    $total_addition =  $total_addition + $staff_data->amount;
                                                                                 }else 
                                                                                 {
                                                                                    $total_deduction  = $total_deduction  - $staff_data->amount;
                                                                                 }
                                                                                 $netpay = $netpay + $staff_data->amount;

                                                                                 @endphp


                                                                                <td>{{$staff_data->payment_description}}</td>
                                                                                <td>{{$staff_data->payment_type}}</td>
                                                                                <td>&#8358; {{number_format($staff_data->amount,2)}}</td> 
                                                                             </tr>
                                                                            @endforeach
                                                                        @endif
                                                                           
                                                                            <tr class="txt-dark">
                                                                                <td rowspan="3"></td>
                                                                                <td><strong>Total Addition</strong></td>
                                                                                <td><font class="text-success">&#8358; {{number_format($total_addition,2)}}</font></td>
                                                                            </tr>
                                                                            <tr class="txt-dark">
                                                                                
                                                                                <td><strong>Total Deduction</strong></td>
                                                                                <td> <font class="text-danger">- &#8358; {{number_format($total_deduction,2)}}</font></td>
                                                                            </tr>
                                                                            <tr class="txt-dark">
                                                                                
                                                                                <td><strong>Net Payment</strong></td>
                                                                                <td>&#8358; {{number_format($netpay,2)}}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"><br/></div>
                                                        <div class="pull-right">
                                                                    
                                                                <button type="button" class="btn btn-success btn-outline btn-icon left-icon" onclick="javascript:window.print();"> 
                                                                    <i class="fa fa-print"></i><span> Print</span> 
                                                                </button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
            <!-- /Row -->

</div>


<script>
        
       
        

        
 </script>


@endsection 