@extends('layouts.datatable-adminlte2-4-0')
@section('title') Add Group Admin @endsection
@section('content')

      <section class="content-header">
      <h1>
            Add Group Admin for {{$group_name}}
      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Map Users</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box-header">
                        <!--   @permission(('can-register-users')) 
                                    <a href="{{ url('/register_user') }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-user-plus"></i></span> Register New User</button></a>
                                @endpermission  -->
                  <form method = 'POST' action = "{{url('/store_group_admin')}}">
                        @csrf
                        <p>Use the check box below to select group administrators</p>
                                <div class="row">
                                   
                                 
                                    <div class="col-md-3">
                                                    <button style="margin-top:25px" type="submit" class="btn btn-primary block">Save Changes</button>
                                    </div>
                                </div>
                              <input type="hidden" name="group_id" id="group_id" value="{{$group_id}}">
                    
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable"><input type="checkbox" name="allcb" id="allcb"> Name</th>
                  <th class="exportable">SAP#</th>
                  <th class="exportable">Department</th>
                  <th class="exportable">Category </th>
                  <!-- <th class="exportable"></th> -->
                  <!-- <th class="exportable">HBP</th> !-->


                  
                  <!-- <th>Select</th> -->
                </tr>
                </thead>
                <tbody>
                @if(isset($users))
                   @foreach ($users as $a => $user)  
                        <tr>
                                <td>{{$a + 1}}</td>
                                <td>
                                        <div class="custom-control custom-checkbox">
                                        <label class="custom-control-label"> <input {{in_array($user->sap,$already_added_arr)?"checked":""}} type="checkbox" name="staff_id[]" value="{{$user->sap}}" class="custom-control-input">
                                            &nbsp;{{$user->name}}</label>
                                        </div>
                                </td>
                                <td>{{$user->sap}}</td>
                                <td>{{$user->department_name}}</td>
                                <td>{{$user->staff_category_name}}</td>
                                <!-- <td></td> -->
                                <!-- <td>{{$user->HR_Officer}}</td> !-->

                                
                        </tr>
                @endforeach
                @endif
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->

                    
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
            </form>
    <script>



@if(Session::get('success'))

swal("Saved Successful", "{{Session::get('success')}}", "success");
		
@endif


$('#allcb').change(function(){

if($(this).prop('checked')){
    var cnt = 0;
    $('tbody tr td input[type="checkbox"]').each(function(){
        $(this).prop('checked', true);
        cnt++;
    });
    //$("#button-group").show();
    //$("#button-group").text('Take action on '+cnt+' record(s) ' );
}else{
    $('tbody tr td input[type="checkbox"]').each(function(){
        $(this).prop('checked', false);
    });
    //$("#button-group").hide();
    //$("#button-group").text("");
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

// </script>
@endsection




// {{-- //////datatable script start here////////////////// --}}
// @section('datatableissuesfixed')
// <script type="text/javascript">

// $('form').on('submit', function (e) {
//         $('.datatable').DataTable().destroy();
//     });
    
    
//    $(document).ready(function() {
//     var table = $('#example1').removeAttr('width').DataTable( {
//       // the Width control starts here
//         scrollY:        "300px",
//         scrollX:        true,
//         scrollCollapse: true,
//         paging:         false,
//         info:           true,
//         ordering:       true,
//         searching:      true,
//         columnDefs: [
//             { width: 8, targets: 0 },
//             { width: 120, targets: 1 },
//             { width: 90, targets: 2 },
//             { width: 180, targets: 3 },
//             { width: 140, targets: 4 },
//             // { width: 120, targets: 5 },
//             { width: 90, targets: 5 },
//             // { width: 950, targets: 6 },

//         ],
//        fixedColumns: { leftColumns: 3 },

// // the export starts here
        
//         dom: 'Bfrtip',
//         buttons: [

//       {
//          extend: 'excel',
//          text: 'Save as Excel',
//         exportOptions: {
//             columns: ':visible.exportable'
//         }
//       },
      
// ]

    
//     } );
// } ); 
// </script>


@endsection
{{-- //////datatable script ends here////////////////// --}}

