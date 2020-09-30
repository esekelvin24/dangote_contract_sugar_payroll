@extends('layouts.datatable-adminlte2-4-0')
@section('title') Trainee Log Details @endsection
@section('content')


    <section class="content-header">
      <h1>
     
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li><a href="{{ url()->previous() }}"><i class="fa fa-dashboard" style="color: blue;"></i> Trainee Log</a></li>
        <li class="active">Trainee Log Details </li>
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
  <h3 class="box-title">NEW TRAINEE FOR <font color="green"><strong>{{$report_lists[0]->staff_name}} ({{$report_lists[0]->sap}})</strong></font></h3>
   
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">


<form id="form" method = 'POST' action = '{{url('/process_trainee_log')}}' enctype="multipart/form-data">
        <table id="tblmarketerinfo" class="table table-bordered"> 
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

<tbody>
    <tr class="even pointer">
        <th scope="row" bgcolor="#F5F7FA">Duration</th>
        <td class="pull-xs-left col-sm-9 col-xs-8">
            {{substr($report_lists[0]->end_date,0,10)}}&nbsp;&nbsp;<strong>To</strong>&nbsp;&nbsp;{{substr($report_lists[0]->start_date,0,10)}}
        @if ($errors->has('phone_number'))
            <span class="help-block">
            <font color="red"><strong>{{ $errors->first('phone_number') }}</strong></font>
            </span>
        @endif
        </td>
    </tr>
</tbody>
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Department:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                {{$report_lists[0]->department_name}}
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach($report_lists as $val)
                                        <tbody>
                                            <tr class="even pointer">
                                                <th scope="row" bgcolor="#F5F7FA">Week {{$counter += 1}}:</th>
                                                <td class="pull-xs-left col-sm-9 col-xs-8">

                                                <textarea disabled rows="8" class="form-control" id="week"  placeholder="">{{$val->work_done}}</textarea>

                                                @if ($errors->has('week'))
                                                    <span class="help-block">
                                                    <font color="red"><strong>{{ $errors->first('week') }}</strong></font>
                                                    </span>
                                                @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach

                                    


                                  

                        
 
                                   <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">HOD Comments:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">

                                            <textarea {{$report_lists[0]->status == 0?"":'disabled'}} rows="8" class="form-control" id="note" name="note" placeholder="Enter a comment for this log">{{ $val->hod_comment }}</textarea>

                                              @if ($errors->has('note'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('note') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                    <input value="" type="hidden" id="button_click" name="button_click">
                                    <input value="{{base64_encode($report_lists[0]->schedule_id)}}" type="hidden" id="schedule_id" name="schedule_id">
                                   
                                      @if($report_lists[0]->status ==0)
                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA"></th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                <button data-id="{{base64_encode('2')}}" class = 'btn btn-danger create' type ='submit'><i class="fa fa-close"></i> Reject</button> &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <button data-id="{{base64_encode('1')}}" class = 'btn btn-success create' type ='submit'><i class="fa fa-check"></i> Approve</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endif

       

                           
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

$('form#form').on('click','button.create',(function(e)
{
			e.preventDefault();

           var btn_click = $(this).attr("data-id");
           $('#button_click').val(btn_click);

           $('form#form').submit(); 

       
}));

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