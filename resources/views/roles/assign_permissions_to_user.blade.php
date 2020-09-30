@extends('layouts.datatable-adminlte2-4-0')
@section('title') Assign Permissions to user @endsection
@section('content')  

<section class="content-header">
      <h1>
         Assign Permissions to user
      </h1>
        <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active">Assign Permissions to user </li>
      </ol>
</section>

<section class="content">
    <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Assign Permissions to ({{$user_details->name}})  @permission(('can-assign-special-pemissions-to-users')) ##this is test perm## @endpermission </h3>

               
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <div class="row">
              <div class="box-body">
 <table id="tblmarketerinfo" class="table table-bordered"> 
                                 
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Name:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8"> {{ $user_details->name }}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Email:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{ $user_details->email }}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Current Role:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$user_details->role_desplay_name}}</td>
                                        </tr>
                                    </tbody>

                                <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Permissions Associated with Current Role:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                           @if(!empty($rolePermissions))
                                              @foreach($rolePermissions as $v)
                                                <label class="label label-success">{{ $v->display_name }}</label>
                                              @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                               
                               <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">Special Permissions:</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                           @if(!empty($userPermissions))
                                              @foreach($userPermissions as $s)
                                                <label class="label label-success">{{ $s->display_name }}</label>
                                              @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>

                                   
</table>



         <form  action="{{ url('/store_assign_permissions_to_user/'.$user_details->id) }}" method="POST">
        {{ method_field('PATCH') }}
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        

<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Assign Permissions</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="box-body">
 



        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
       
          @foreach($permission as $value)
            <input type="checkbox" name="permission[]" value="{{$value->id}}" @if( in_array($value->id, $PermissionsUser) ) checked="1" @endif />{{ $value->display_name }}<br>
           @endforeach 

        </div>



        

  </div>
            </div>
            <button type="submit" class="btn bg-blue">Update</button>

    </section>
  </div>
</div>
    </div>

        
         </form>
    </div></div></div></div></div>
</section>

@endsection

@section('datatableissuesfixed')
@endsection