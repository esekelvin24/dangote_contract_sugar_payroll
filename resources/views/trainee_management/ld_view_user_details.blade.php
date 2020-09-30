@extends('layouts.datatable-adminlte2-4-0')
@section('title') View User's Details @endsection
@section('content')


    <section class="content-header">
      <h1>
     User Details for <font color="green"><strong>{{$user_details->name}} ({{$user_details->sap}})</strong></font>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        @permission(('can-view-all-users'))
         <li><a href="{{ url()->previous() }}"><i class="fa fa-users" style="color: blue;"></i> User Search List </a></li>
         @endpermission
        <li class="active">User Details</li>
      </ol>
</section>

<section class="content"> 
<div class="row">
   <div class="col-md-6">
    <br>

 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">User Details</h3>

@if($permit_check ==1)
     @permission(('can-create-schedule'))
     <a href="{{ url('/ld_edit_user/'.$user_details->id) }}"><button type="button" class="btn btn-sm btn-flat btn-default"><span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button></a>
     @endpermission 

     @permission(('can-edit-user-search-details'))
     <a href="{{ url('/new_schedule/'.$user_details->sap) }}"><button type="button" class="btn btn-sm btn-flat btn-default"><span class="btn-label"><i class="fa fa-plus"></i></span> Create Schedule</button></a>
     @endpermission
    
@endif    
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">

        <table id="tblmarketerinfo" class="table table-bordered"> 
                
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Name:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$user_details->name}}</td>
                                        </tr>
                                    </tbody>

                                     <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">SAP NO:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$user_details->sap}}</td>
                                        </tr>
                                    </tbody>

                                   <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Department:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$user_details->department_name}}</td>
                                        </tr>
                                    </tbody>

                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Staff Category:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$user_details->staff_category_name}}</td>
                                        </tr>
                                    </tbody> 

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Email:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$user_details->email}}</td>
                                        </tr>
                                    </tbody>

                                       <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Designation:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->designation}}               
                                        </td>
                                    </tr>
                                </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Application Role:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$user_details->role_desplay_name}}</td>
                                        </tr>
                                    </tbody>

                                  <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Office Location:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->perment_office_location_name}}               
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Business Unit:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->bu_name}}               
                                        </td>
                                    </tr>
                                </tbody>

                                

                                 <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Staff Grade Level:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->staff_grade_level}}               
                                        </td>
                                    </tr>
                                </tbody>


                                  <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Phone Number:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->phone}}               
                                        </td>
                                    </tr>
                                </tbody>

                                  <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Estate/Residential Address:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->estate_name}}               
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">PE Number:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->pe_number}}               
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Date Of Birth:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->date_of_birth}}               
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Date of joining in Refinery:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->date_of_joining_in_refinery}}               
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Years of Experience prior to Refinery:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->years_of_experience_prior}}               
                                        </td>
                                    </tr>
                                </tbody>

                                

                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Home Country Phone Number:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->home_country_phone_no}}               
                                        </td>
                                    </tr>
                                </tbody>
                                
                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Emergency Contact Phone Number:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->emergency_contact_no}}               
                                        </td>
                                    </tr>
                                </tbody>
                                
                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Personal Email ID:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->personal_email_id}}               
                                        </td>
                                    </tr>
                                </tbody>
                                
                               

                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Home Town:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                          {{$user_details->home_town}}               
                                        </td>
                                    </tr>
                                </tbody>


                                   {{-- 
                                   <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Designation:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$user_details->designation}}</td>
                                        </tr>
                                   </tbody>


                                   <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Scanned Signature:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8"> 
                                          @if ( !empty ($user_details->scanned_signature))
                                               <img src="{{ asset('uploads/scanned_signature/' . $user_details->scanned_signature) }}"  height="42" width="60" />
                                               @endif
                                             </td>
                                        </tr>
                                    </tbody> --}}
                              
                                   
</table>
 </div></div></div></div></div>


{{--         <div class="col-md-6">
   
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="{{ asset('user_profile_image/' . $profile_image->photo) }}" alt="" class="img-rounded img-responsive" />
                    </div>
                     <div class="col-sm-6 col-md-8">
                     
                      <a href="{{ url('/update_user_profile_image/'.$user_details->user_id) }}"><button type="button" class="btn btn-sm btn-flat btn-success"><span class="btn-label"><i class="fa fa-edit"></i></span> Change Image</button></a>

               <!--     <a href=""><button type="button" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span> Remove Image</button></a> -->

                      <button type="button" class="btn btn-sm btn-flat btn-danger" onclick="deleteuserimage(this.id)" id="{{$user_details->user_id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Remove Image</button>
      
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></div>  --}}</div></section>


    <script>
 function deleteuserimage(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Are you sure?",
    text: "You want to remove this Image!",   type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, remove it!", 
    closeOnConfirm: false 
  }, 
       function(){   
        window.location.href = "{{ url('/remove_user_profile_image') }}" + '/' + e;
    // $("#myform").submit();
  });
}

</script>

   <script>
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