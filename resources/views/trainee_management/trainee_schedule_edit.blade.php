@extends('layouts.datatable-adminlte2-4-0')
@section('title') Department Report List @endsection
@section('content')

    <section class="content-header">
       
    <h1>
    
    Edit Trainee Schedule @if(isset($users[0])) for (<strong style="color:green">{{$users[0]->staff_name}}</strong>)
    @endif
   
   
    </h1>
        
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li><a href="{{ url('/trainee_schedule/none') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Trainee Schedule</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Trainee Schedule Details</li>
      </ol>
    </section>



    

   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            
            @php
                $filter = isset($filter)?$filter:"";
                $department_list = isset($department_list)?$department_list:array();

                 
            @endphp

         
          
            <!-- /.box-header -->
            <div class="box-body table-responsive">

              @if (isset($staff_details->name))
                <button data-toggle="modal" data-target="#myModal" style="margin-bottom:5px; margin-top:5px;" class="btn btn-success "><i class="fa fa-plus"></i> Add New Schedule</button>
              @endif

             <div  class="btn-group" role="group">
                <button style="margin-bottom:5px; margin-top:5px; display:none" id="button-group" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Perform action
                </button>
                <div class="dropdown-menu" aria-labelledby="button-group">
                  <a  style="color: red" class="dropdown-item" href="javascript:delete_selected()">&nbsp;<i class="fa fa-trash"></i> Delete</a><br/>
                </div>
              </div>

             



         @if($users != null)
              
            <form action="{{url('/delete_selected_schedule')}}" id="form" method="POST">
              @csrf
              @if(isset($users[0]))
                 <input type="hidden" id="sap" name="sap" value="{{base64_encode($users[0]->sap)}}">
              @endif
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                <th class="exportable"><input class="" type="checkbox" name="allcb" id="allcb"> SAP</th>
                <th class="exportable">Name</th>
                  <th class="exportable">Rotation</th>
                  <th class="exportable">Office Location</th>
                  <th class="exportable">Department</th>
                  <th class="exportable">Start Date</th>
                  <th class="exportable">End Date</th>
                 
                </tr>
                </thead>
                <tbody>

                 

                @php
                      $counter = 0;
                  @endphp
                  
                  
                        @if(count($users) > 0)
                          @foreach ($users as $val)  
                            <tr>
                              <td><input  type="checkbox" name="schedule_id[]" value="{{base64_encode($val->schedule_id)}}" class="custom-control-input"> {{$val->sap}}</td>
                              <td>{{$val->staff_name}}</td>
                              <td>{{$counter = $counter + 1}}</td>
                              <td>{{$val->perment_office_location_name}}</td>
                              <td>{{$val->department_name}}</td>
                              <td>{{substr($val->start_date,0,10)}}</td>
                              <td>{{substr($val->end_date,0,10)}}</td>
                            </tr>
                          @endforeach
                        @endif
                      
                 
                </tbody>
              </table>
                 </form> 


                 @else


                 <div style="padding-top: 100px" align="center">
                   <img src="{{asset('img/warning.png')}}" height="80" width="80"><br/>
                   @if (isset($staff_details->name))
                     <h4> There is no schedule found for <strong>{{$staff_details->first_name." ".$staff_details->name}}</strong></h4> <br/>
                   @else
                     <h4> Invalid User, kindly contact admin</h4> <br/>
                   @endif
                  </div>
   
                 @endif

            </div>


              


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    
    <div class="modal-dialog modal-s">
      <div style="margin-top:150px !important" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Schedule</h4>

          <p id="error_mess" style="margin-top:10px; display:none; color: white; background-color:#ca1111">error</p>
        </div>
        <div class="modal-body">
         
        <form method="POST" action="{{url('/add_new_single_schedule')}}" >
          @csrf

             <input required type="hidden" id="sap" name="sap" value="{{base64_encode($sap)}}">
                <table>
                  <tr>
                    <td >
                      <label>Location</label>
                      <select required name="location" style="min-width:150px !important" class="form-control">
                         <option value="">Select Location</option>
                         
                         @foreach($locations as $val)
                            <option value="{{$val->perment_office_location_id}}">{{$val->perment_office_location_name}}</option>
                         @endforeach

                      </select>
                    </td>
                    <td>&nbsp;</td>

                    <td>
                      <label>Department</label>
                      <select required name="department" style="min-width:150px !important"  class="form-control">
                         <option value="">Select Department</option>

                         @foreach($departments as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                         @endforeach
                         
                      </select>
                    </td>
                       <td>&nbsp;</td>
                    <td>
                          <label>Start Date</label>
                          <input required data-date-format="yyyy-mm-dd" class="form-control date-own" id="start_date" name="start_date"  value="">
                    </td>
                       <td>&nbsp;</td>
                    <td>
                          <label>End Date</label>
                          <input required data-date-format="yyyy-mm-dd" class="form-control date-own" id="end_date" name="end_date"  value="">
                    </td>
                    <td>&nbsp;</td>
                    <td><button type="submit" style="margin-top:25px" class="btn btn-success"> Submit</button></td>



                  </tr>

                </table>
          </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>  



<script type="text/javascript">


$(function () {
               
                $('#start_date').datepicker({
                  dateFormat: "yy-mm-dd",
                }).on('change', function()
                {
                    if (new Date($(this).val()) > new Date($('#end_date').val()))
                    {
                     
                      $("#error_mess").html('&nbsp;<i class="fa fa-warning"></i> start date can not be above that end date');
                      $("#error_mess").show();
                      $(this).val('');
                    }else { $("#error_mess").hide(); }
                    $('#start_date').datepicker("hide");
                });


                
               
                $('#end_date').datepicker({
                  dateFormat: "yy-mm-dd",
                }).on('change', function()
                {
                    if (new Date($(this).val()) < new Date($('#start_date').val()))
                    {
                      $("#error_mess").html('&nbsp;<i class="fa fa-warning"></i> end date can not be lesser that start date');
                      $("#error_mess").show();
                      $(this).val('');
                    }else { $("#error_mess").hide(); }
                    $('#end_date').datepicker("hide");
                   
                });
  });


        


</script>


    <script>



@if(Session::get('success'))

swal("Successful", "{{Session::get('success')}}", "success");
		
@endif




@if(Session::get('error'))

swal("Error Deleting", "{{Session::get('error')}}", "error");

@endif


@if(Session::get('error_adding'))

swal("Error Creating Schedule", "{{Session::get('error_adding')}}", "error");

@endif





function delete_selected()
{
              swal({
              title: "Are you sure?",
              text: "Your are about deleting the selected schedule",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              cancelButtonText: "No, cancel",
              closeOnConfirm: false,
              closeOnCancel: false
              },
              function(isConfirm) {
                if (isConfirm) {
                       $("form#form").submit();
                } else {
                  swal.close();
                // swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
              });
}

$('.custom-control-input').change(function(){

         
          var count = $('input[type="checkbox"].custom-control-input:checked').length;

          $("#button-group").show();
          $("#button-group").text('Take action on '+count+' record(s) ' );

          if (count == 0)
          {
              $("#button-group").hide();
              $("#button-group").text("");
              $('#allcb').prop('checked',false);
          }
             

}); 

$('#allcb').change(function(){

      if($(this).prop('checked')){
          var cnt = 0;
          $('tbody tr td input[type="checkbox"]').each(function(){
              $(this).prop('checked', true);
              cnt++;
          });
          if(cnt >0)
          {
            $("#button-group").show();
          }
         

          $("#button-group").text('Take action on '+cnt+' record(s) ' );
      }else{
          $('tbody tr td input[type="checkbox"]').each(function(){
              $(this).prop('checked', false);
          });
          $("#button-group").hide();
          $("#button-group").text("");
      }
}); 






 function deleteuser(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Are you sure?",
    text: "You want to delete this User!",   type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!", 
    closeOnConfirm: false 
  }, 
       function(){   
       window.location.href = "{{ url('/delete_user') }}" + '/' + e;

    // $("#myform").submit();
  });
}

</script>
@endsection

{{-- //////datatable script start here////////////////// --}}
@section('datatableissuesfixed')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example1').removeAttr('width').DataTable( {
        
        scrollCollapse: false,
        paging:         true,
        ordering:       true,
        searching:    true,
       
        
        pageLength: 40,
        dom: 'Bfrtip',
        buttons: [

      {
         extend: 'excel',
         text: 'Save as Excel',
        exportOptions: {
            columns: ':visible.exportable'
        }
      },
      
]

    
    } );
} );
</script>
@endsection
{{-- //////datatable script ends here////////////////// --}}