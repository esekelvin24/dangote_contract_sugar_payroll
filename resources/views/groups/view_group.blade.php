@extends('layouts.datatable-adminlte2-4-0')
@section('title') View Group Details @endsection
@section('content')


    <section class="content-header">
      <h1>
     View Group Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
         @role(('chs_admin_role'))
         <li><a href="{{ url('/manage_groups') }}"><i class="fa fa-archive" style="color: blue;"></i> Manage Group </a></li>
         @endrole
        <li class="active">Group Details</li>
      </ol>
</section>

<section class="content"> 
<div class="row">
   <div class="col-md-6">
    <br>

 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">Group Details</h3>
    
     <a href="{{ url('/edit_group/'.$collections->group_id) }}"><button type="button" class="btn btn-sm btn-flat btn-success"><span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button></a>
    
    
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">

        <table id="tblmarketerinfo" class="table table-bordered"> 
                                 
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Name:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8"> {{ $collections->group_name }}</td>
                                        </tr>
                                    </tbody>

                                    
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Description:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{ $collections->description }}</td>
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