@extends('layouts.datatable-adminlte2-4-0')
@section('title') Application Settings @endsection
@section('content')

 
    <section class="content-header">
      <h1>
    Application Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"> Application Settings</li>
      </ol>
</section>


<section class="content">
    <div class="col-md-6">
    <br>

 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">Email Notification Settings</h3>
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">

    <table id="tblmarketerinfo" class="table table-bordered"> 
                                 
      <tbody>
          <tr class="even pointer">
              <th scope="row" bgcolor="#F5F7FA">Email Notification Status:</th>
              <td class="pull-xs-left col-sm-8 col-xs-7">

                <div id="display_email_notification">
                     @if ($email_notifications->email_notification == 0)
                        <i class="fa fa-times" style="color: red;"> Disabled </i>
                      @elseif ($email_notifications->email_notification == 1) 
                         <i class="fa fa-check" style="color: green;"> Enabled </i>
                      @endif
                </div>
           
              </td>
          </tr>
      </tbody>

        <tbody>
          <tr class="even pointer">
              <th scope="row" bgcolor="#F5F7FA">Change Email Notification Status:</th>
              <td class="pull-xs-left col-sm-8 col-xs-7">
             <div class="btn-group" data-toggle="buttons">  
              <label class="btn btn-primary @if ($email_notifications->email_notification == 1) active @endif ">
                <input type="radio" name="pen_is_retired" id="option1" value="1" required  @if ($email_notifications->email_notification == 1) checked @endif  onchange="call_notification_fun(this.value);" >Enable
              </label>
              <label class="btn btn-primary @if ($email_notifications->email_notification == 0) active @endif ">
                <input type="radio" name="pen_is_retired" id="option2"  value="0" @if ($email_notifications->email_notification == 0) checked @endif onchange="call_notification_fun(this.value);"> Disable
              </label>
            </div>
              </td>
          </tr>
      </tbody>
                              
    </table>
</div></div></div>


 </div>
  </div>

       <div class="row">
        <div class="col-md-4">
          

          </div></div>
</section>
<!-- ///////////////////////////////////////////////////////////////////////////////// -->


 <script>
 function deletebatchingplant(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Are you sure?",
    text: "You want to delete this Batching Plant!",   type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!", 
    closeOnConfirm: false 
  }, 
       function(){   
       window.location.href = "{{ url('/delete_batching_plant') }}" + '/' + e;
    // $("#myform").submit();
  });
}
</script>


<script type="text/javascript">
function call_notification_fun(val)
{
 $.ajax({
 type: 'get',
 url: '{{url('/ajax_get_email_notification')}}',
 data: {
 get_option:val
 },
 success: function (response) {
  $("#display_email_notification").html(response);
 }
 });
}

</script>
@endsection