@extends('layouts.datatable-adminlte2-4-0')
@section('title') Training Invitation @endsection
@section('content')

      <section class="content-header">
      <h1>
            Invite ET/MT for Training
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
                        <form method = 'POST' action = "{{route('save_mapping')}}">
                        @csrf
                        <input type = 'hidden' name = 'user_category' value = "{{$user_category}}">
                         @permission(('can-view-all-users')) 
                                <a href="{{ url('/map_users?category=1&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> National Staff</button></a>

                                <a href="{{ url('/map_users?category=2&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Expat Staff</button></a>

                                <a href="{{ url('/map_users?category=3&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Casual Workers</button></a>

                                <a href="{{ url('/map_users?category=4&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Contract Staff</button></a> 

                                <a href="{{ url('/map_users?category=all&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> All Staff</button></a> 
                        @endpermission 
                                     <br/> <br/>      
                                <div class="row">
                                    <div class="col-md-3">
                                       
                                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}"">
                                                    <label>Staff Type </label>
                                                    <select onchange="FilterByStaffCategory(this.value)" name = 'hr_user_id' id = 'hr_user_id' class = 'form-control' required>
                                                    <option value="">All Staff</option>
                                                    <option value="ET">ET</option>
                                                    <option value="MT">MT</option>
                                                    
                                                    </select>
                                            </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                       
                                    </div>

                                    <div class="col-md-3">
                                                    <button style="margin-top:25px" type="submit" class="btn btn-primary block">Filter</button>
                                    </div>
                                </div>
                    
            </div>
@if($user_category !="non")
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
                 


                  @php
                      $a = 0;
                  @endphp

                @if(isset($users))
                   @foreach ($users as $user)  
                        <tr>
                                <td>{{$a = $a + 1}}</td>
                                <td>
                                        <div class="custom-control custom-checkbox">
                                           <label class="custom-control-label"> <input  type="checkbox" name="staff_id[]" value="{{$user->id}}" class="custom-control-input">
                                            &nbsp;{{$user->name}}</label>
                                        </div>
                                </td>
                                <td>{{$user->sap}}</td>
                                <td>{{$user->department_name}}</td>
                                <td>{{$user->staff_category_name}}</td>
                                

                                
                        </tr>
                @endforeach
                @endif
                </tbody>
              </table>
              <div align="center">
                <br/>
                <br/>
                <button class="btn btn-success"> Send Invitation</button>
              </div>
            </div>
            <!-- /.box-body -->
@endif
                    
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
            </form>
    <script>

var SITEURL = '{{URL::to('')}}';




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

