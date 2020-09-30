@extends('layouts.datatable-adminlte2-4-0')
@section('title') New Departmental Report @endsection
@section('content')


    <section class="content-header">
      <h1>
     
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li><a href="{{ url('/my_rotation/'.base64_encode(Auth::user()->sap)) }}"><i class="fa fa-dashboard" style="color: blue;"></i> My Rotation</a></li>
        <li class="active">New Departmental Report </li>
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
  <h3 class="box-title">NEW DEPARTMENTAL REPORT</h3>
   
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">


<form id="form" method = 'POST' action = '{!!url("store_departmental_report") !!}' enctype="multipart/form-data">
        <table id="tblmarketerinfo" class="table table-bordered"> 
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
<input required type = 'hidden' name = 'id' value = '{{base64_encode($schedule_id)}}'>

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
                                    
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Select Report:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">

                                             <input type="file" class="form-control" id="report_file" name="report_file" placeholder="Enter work done">

                                              @if ($errors->has('note'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('note') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA"></th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                            <button class = 'btn btn-primary create' type ='submit'>Submit</button>
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


$('form#form').on('click','button.create',(function(e)
{
			e.preventDefault();

      var file = $('input[type="file"]').val();

      var exts = ['pdf'];
      // first check if file field has any value
      if ( file ) {
        
        // split file name at dot
        var get_ext = file.split('.');
        // reverse name to check extension
        get_ext = get_ext.reverse();
        // check file type is valid as given in 'exts' array
        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){

           
          $('form#form').submit();

        } else {

          swal("Invalid File", "Kindly note only PDF files are allowed", "error");
        }

      }else{
        swal("File Not Selected", "Kindly your departmental report", "error");
      }

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