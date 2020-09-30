@extends('layouts.datatable-adminlte2-4-0')
@section('title') Training Details @endsection
@section('content')


    <section class="content-header">
      <h1>
     
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li ><a href="{{ url('/training_list') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Training List</a></li>
        <li class="active">Training Details </li>
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
  <h3 class="box-title">TITLE (<font color="green"><strong>ITIL Profession course</strong></font>)</h3>
   <br/> <br/>
  <a href="{{ url('/invite_et_mt/0120000') }}"><button type="button" class="btn btn-sm btn-flat btn-default"><span class="btn-label"><i class="fa fa-edit"></i></span> Invite ET/MT</button></a>

</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">

    

<form method = 'POST' action = '#' enctype="multipart/form-data">
        <table id="tblmarketerinfo" class="table table-bordered"> 
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

<tbody>
    <tr class="even pointer">
        <th scope="row" bgcolor="#F5F7FA">Venue:</th>
        <td class="pull-xs-left col-sm-9 col-xs-8">
        T & D training Room	
        
        </td>
    </tr>
</tbody>
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Training Type:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                Internal
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Date:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                11-05-2020	
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Status:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                 <font style="color: orange">Closed</font>	
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