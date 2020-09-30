@extends('layouts.datatable-adminlte2-4-0')
@section('title') New Map Users to HR Business Partner (Individual) @endsection
@section('content')


<section class="content-header">
      <h1>
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active">New Map Users to HR Business Partner (Batch)</li>
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
   <div class="col-md-6 col-sm-12">
    <br>

   
 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">NEW BATCH MAP USER TO GROUP</h3><br/><br/>
<strong class="text-red">* Kindly note that staff CSV upload should be in the format of this attached sample CSV file</strong> <br/><a class="" href="{{url('/download/sample_csv_batch_map_user_to_group.csv')}}"><i class="fa fa-download"></i> Download Sample CSV file</a>
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">

<form id="form" method = 'POST' action = '{!!url("store_new_map_user")!!}' enctype="multipart/form-data">
    @csrf
        <table id="tblmarketerinfo" class="table table-bordered"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Staff CSV File List</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                <input name="batch_file" id="batch_file" type="file" class="form-control" value="" >
                                             @if ($errors->has('batch_file'))
                                                <span class="help-block">
                                              <font color="red"><strong>{{ $errors->first('batch_file') }}</strong></font>
                                                </span>
                                             @endif

                                            </td>
                                        </tr>
                                       </tbody> 

                                       @php
                                         $user = Auth::user();
                                       @endphp

                                       @if ($user->can('can-map-user-to-any-hrb-group'))
                                          <tbody>
                                            <tr class="even pointer">
                                                <th scope="row" bgcolor="#F5F7FA">HR Business Partner Group</th>
                                                <td class="pull-xs-left col-sm-9 col-xs-8">
                                                   <select required class="form-control" name="group_id" id="group_id">
                                                    <option value="">Select Group</option>

                                                    @foreach($hr_groups as $val)

                                                       <option value="{{$val->group_id}}">{{$val->group_name}}</option>
                                                    @endforeach
 
                                                   </select>
                                                @if ($errors->has('group_id'))
                                                    <span class="help-block">
                                                  <font color="red"><strong>{{ $errors->first('group_id') }}</strong></font>
                                                    </span>
                                                @endif
                                                </td>
                                            </tr>
                                          </tbody> 
                                        @endif

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
              
              if ($('#batch_file').val() == null)
              {
                swal("Error", "Kindly select a staff CSV file", "error");
              }else{
                  var type=$("input[name='batch_file']").val().split('.')[1];
                  if(type=="csv" || type=="CSV"){
                      $.blockUI({ message: '<h3 style="background:#f1f2f3"><img width="50" height="50" src="{{asset('img/loading.gif')}}" /> Please wait...</h3>' });
                      $("form#form").submit();
                  }else{       
                      swal("Invalid File Format", "Only CSV files are allowed for uploads", "error");
                  }
                  
              }
        })
			});		


  

      $('.date-of-employment').datepicker({

      format: 'yyyy-mm-dd',
           endDate: '+0d',
       });

                  
      @if(Session::get('success'))

      swal("Successful", "{{Session::get('success')}}", "success");
          
      @endif




      @if(Session::get('error'))

      swal("Failed", "{{Session::get('error')}}", "error");

      @endif

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