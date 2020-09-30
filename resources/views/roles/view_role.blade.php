@extends('layouts.datatable-adminlte2-4-0')
@section('title') View Role Details @endsection
@section('content')


    <section class="content-header">
      <h1>
     View Role Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
         @role(('chs_admin_role'))
         <li><a href="{{ url('/manage_roles') }}"><i class="fa fa-archive" style="color: blue;"></i> Manage Roles </a></li>
         @endrole
        <li class="active">Role Details</li>
      </ol>
</section>

<section class="content"> 
<div class="row">
   <div class="col-md-6">
    <br>

 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">Role Details</h3>
    @if($role->default_role==0)
     <a href="{{ url('/edit_role/'.$role->id) }}"><button type="button" class="btn btn-sm btn-flat btn-success"><span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button></a>
     @role(('chs_admin_role'))
      @if ($check_role_user === false)
    <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="deleterole(this.id)" id="{{$role->id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button>
    @endif
     @if ($check_role_user === true)
        <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="cantdeleterole(this.id)" id="{{$role->id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button>
      @endif
     @endrole
     @endif
          @if($role->default_role==1)
           <i class="fa fa-warning" style="color: red"> This is a default Role, can't be Edited or Deleted</i>
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
                                            <td class="pull-xs-left col-sm-9 col-xs-8"> {{ $role->name }}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Display Name:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{ $role->display_name }}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Description:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{ $role->description }}</td>
                                        </tr>
                                    </tbody>
                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Permissions:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                           @if(!empty($rolePermissions))
                                              @foreach($rolePermissions as $v)
                                                <label class="label label-success">{{ $v->display_name }}</label>
                                              @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                               

                                   
</table>
 {{--  <div class="form-group">
                <strong>Permissions:</strong>
                          @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                      <label class="label label-success">{{ $v->display_name }}</label>
                    @endforeach
                  @endif
                      </div> --}}
 </div></div></div></div></div>

 </div></section>


   <script>
 function deleterole(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Are you sure?",
    text: "You want to delete this Role!",   type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!", 
    closeOnConfirm: false 
  }, 
       function(){   
       window.location.href = "{{ url('/delete_role') }}" + '/' + e;

    // $("#myform").submit();
  });
}

</script>


   <script>
 function cantdeleterole(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Role can't be deleted",
    text: "This Role can't be deleted because it has been assigned to user(s). You have to assign new role the user(s) before you can delete this!",   type: "warning",     
    confirmButtonColor: "#DD6B55",
    closeOnConfirm: false 
  }, 
       );
}

</script>
@endsection