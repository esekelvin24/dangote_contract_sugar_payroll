@extends('layouts.datatable-adminlte2-4-0')
@section('title') New Trainee Log @endsection
@section('content')

@php

function weeks_between($datefrom, $dateto)
    {
        $datefrom = DateTime::createFromFormat('Y-m-d',$datefrom);
        $dateto = DateTime::createFromFormat('Y-m-d',$dateto);
        $interval = $datefrom->diff($dateto);
        $week_total = $interval->format('%a')/7;
        return ceil($week_total);

    }
    
@endphp


    <section class="content-header">
      <h1>
     
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li><a href="{{ url('/my_rotation/'.base64_encode(Auth::user()->sap)) }}"><i class="fa fa-dashboard" style="color: blue;"></i> My Rotation</a></li>
        <li class="active">New  Trainee Log </li>
      </ol>
</section>

<section class="content">
      
@if (count($errors))
    <div class="alert alert-danger">
<button class="close" data-dismiss="alert">×</button>
        @foreach ($errors->all() as $error)
              <p > {{ $error }}</p>
        @endforeach
    </div>
    @elseif(Session::has('message'))
  <div class="alert alert-danger">
<button class="close" data-dismiss="alert">×</button>
        <p><?php echo Session::get('message'); ?></p>
</div>
@endif 

<section class="content"> 
<div class="row">
   <div class="col-md-6">
    <br>

 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">NEW TRAINEE LOG</h3>
   
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">


<form method = 'POST' action = '{{ url("/store_trainee_log") }}' enctype="multipart/form-data">
        <table id="tblmarketerinfo" class="table table-bordered"> 
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
<input type = 'hidden' name = 'id' value = '{{base64_encode($schedule_id)}}'>
@php
  $weeks = weeks_between(substr($rotation_details->start_date,0,10), substr($rotation_details->end_date,0,10));
  $counter = 0;
@endphp


                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Duration:</th>  
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                        <strong>{{substr($rotation_details->start_date,0,10)}}</strong>  &nbsp;&nbsp;  To &nbsp;&nbsp;    <strong>{{substr($rotation_details->end_date,0,10)}}</strong> 
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">No of Week(s):</th>  
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                        <strong> {{$weeks}} </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Department:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                            
                                               {{$rotation_details->name}}
                                                

                                            @if ($errors->has('phone_number'))
                                                <span class="help-block">
                                                <font color="red"><strong>{{ $errors->first('phone_number') }}</strong></font>
                                                </span>
                                            @endif
                                            </td>
                                        </tr>
                                    </tbody>


                                    @for($i = 0; $i < $weeks; $i++)
                                    @php
                                      $counter = $counter + 1;
                                    @endphp
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Week {{$counter}}:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">

                                             <textarea required rows="8" class="form-control" id="work_done" name="work_done[{{$counter}}]" placeholder="Enter work done"></textarea>

                                              @if ($errors->has('work_done'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('work_done') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                    @endfor

                                    

                                  

                        
 
                                    

                                   

                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA"></th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                            <button class = 'btn btn-primary' type ='submit'>Submit</button>
                                            </td>
                                        </tr>
                                    </tbody>

       

                           
</table>
 </form>  


 </div></div></div></div></div>

</div>
</section>

@endsection

@section('datatableissuesfixed')

<script type="text/javascript">

      $('.month_of').datepicker({

      format: 'yyyy-mm-dd',
           endDate: '+0d',
       });

</script>
{{-- 
<script type="text/javascript">

      $('.start-date').datepicker({

      format: 'yyyy-mm-dd',
           startDate: '-0d'

         // maxDate:new Date(),
         // maxDate: +2
       });

</script>

<script type="text/javascript">

      $('.end-date').datepicker({

      format: 'yyyy-mm-dd',
           startDate: '-0d'

         // maxDate:new Date(),
         // maxDate: +2
       });

</script> --}}


<script type="text/javascript">
var startDate = new Date();
var FromEndDate = new Date('2099/01/01');
var ToEndDate = new Date();
ToEndDate.setDate(ToEndDate.getDate() + 365);

$('.from_date').datepicker({
  format: 'yyyy-mm-dd',
weekStart: 1,
startDate: '+1d',
endDate: FromEndDate,
autoclose: true
})
.on('changeDate', function (selected) {
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('.to_date').datepicker('setStartDate', startDate);
    });
$('.to_date')
    .datepicker({
        format: 'yyyy-mm-dd',
        weekStart: 1,
        startDate: startDate,
        endDate: ToEndDate,
        autoclose: true
    })
    .on('changeDate', function (selected) {
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('.from_date').datepicker('setEndDate', FromEndDate);
    });
</script>

<script type="text/javascript">
function call_hod_approver_list(val)
{
 $.ajax({
 type: 'get',
 url: '{{url('/ajax_get_hod_approver_list')}}',
 data: {
 get_option:val
 },
 success: function (response) {
 $("#display_hod_approver_list").html(response);

 }
 });
}
</script>

@endsection