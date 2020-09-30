@extends('layouts.datatable-adminlte2-4-0')
@section('title') New Schedule @endsection
@section('content')


    <section class="content-header">
      <h1>
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li><a href="{{ url()->previous() }}"><i class="fa fa-dashboard" style="color: blue;"></i> User Search List</a></li>
        <li class="active">New Schedule </li>
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

@if($display_form != "yes")

<div style="padding-top: 100px" align="center">
    
    <img src="{{asset('img/warning.png')}}" height="80" width="80"><br/>
   <h4> {!!$display_form!!}</h4>
 </div>

@else

<section class="content"> 
<div class="row">
   <div class="col-md-6">
    <br>

   
 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">NEW MULTIPLE SCHEDULE CREATION</h3><br/><br/>
<a class="btn btn-success" href="{{url('/edit_schedule/'.base64_encode($check->sap))}}"><i class="fa fa-plus"></i> Add Single Schedule</a>
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">

<form id="form" method = 'POST' action = '{!!url("store_new_schedule")!!}' enctype="multipart/form-data">
    @csrf
        <table id="tblmarketerinfo" class="table table-bordered"> 
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
<input type = 'hidden' name = 'sap' value = '{{$check->sap}}'>


                                       

                                        <tbody>
                                            <tr class="even pointer">
                                                <th scope="row" bgcolor="#F5F7FA">Staff Name:</th>
                                                <td class="pull-xs-left col-sm-9 col-xs-8">

                                                             {{$check->first_name." ".$check->name}}
                                                   

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
                                            <th scope="row" bgcolor="#F5F7FA">Schedule File</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                <input name="schedule_file" id="schedule_file" type="file" class="form-control" value="" >
                                             @if ($errors->has('schedule_file'))
                                                <span class="help-block">
                                              <font color="red"><strong>{{ $errors->first('schedule_file') }}</strong></font>
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

@endif

@endsection

@section('datatableissuesfixed')

<script type="text/javascript">

			$(document).ready(function(){
				$("button.create").click(function(e){
					e.preventDefault();
					var type=$("input[name='schedule_file']").val().split('.')[1];
					if(type=="csv" || type=="CSV"){
						$("form#form").submit();
					}else{
                        
                        swal("Invalid File Format", "Only CSV files are allowed for uploads", "error");
					}
				})

			});		


  

      $('.date-of-employment').datepicker({

      format: 'yyyy-mm-dd',
           endDate: '+0d',
       });

</script>


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