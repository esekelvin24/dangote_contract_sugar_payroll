@extends('layouts.datatable-adminlte2-4-0')
@section('title') View Permission Details @endsection
@section('content')


    <section class="content-header">
      <h1>
     View Permission Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
         <li><a href="{{ url('/manage_permissions') }}"><i class="fa fa-key" style="color: blue;"></i> Manage Permissions </a></li>    
        <li class="active">Permission Details</li>
      </ol>
</section>

<section class="content"> 
<div class="row">
   <div class="col-md-6">
    <br>

 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">Permission Details</h3>
   
     <a href="{{ url('/edit_permission/'.$permission->id) }}"><button type="button" class="btn btn-sm btn-flat btn-success"><span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button></a>
    
<!--  @if ($check_permission_role === false)
   <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="deletepermission(this.id)" id="{{$permission->id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button>
   @endif
    @if ($check_permission_role === true)
       <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="cantdeletepermission(this.id)" id="{{$permission->id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button>
     @endif -->
  
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">

        <table id="tblmarketerinfo" class="table table-bordered"> 
                                 
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Name:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8"> {{ $permission->name }}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Display Name:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{ $permission->display_name }}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Description:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{ $permission->description }}</td>
                                        </tr>
                                    </tbody>

                                 <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Roles Associated with this permission:</th>
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

 </div></div></div></div></div>

 </div></section>

   <script>
 function deletepermission(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Are you sure?",
    text: "You want to delete this Permission!",   type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!", 
    closeOnConfirm: false 
  }, 
       function(){   
       window.location.href = "{{ url('/delete_permission') }}" + '/' + e;

    // $("#myform").submit();
  });
}

</script>


   <script>
 function cantdeletepermission(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Permission can't be deleted",
    text: "This Permission can't be deleted because it has been assigned to Role(s).",   type: "warning",     
    confirmButtonColor: "#DD6B55",
    closeOnConfirm: false 
  }, 
       );
}

</script>
@endsection