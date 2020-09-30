@extends('layouts.datatable-adminlte2-4-0')
@section('title') Edit Role @endsection
@section('content')  

<section class="content-header">
      <h1>
         Edit Role
      </h1>
        <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
         <li><a href="{{ url('/manage_roles') }}"><i class="fa fa-archive" style="color: blue;"></i> Manage Roles</a></li>
        <li class="active">Edit Role </li>
      </ol>
</section>

<section class="content">
    <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Role </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <div class="row">
              <div class="box-body">

         <form  action="{{ url('/store_updated_role/'.$role->id) }}" method="POST">
        {{ method_field('PATCH') }}
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{{ $role->name }}" required readonly>
              @if ($errors->has('name'))
                <span class="help-block">
                 <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
            <label for="display_name">Display Name</label>
            <input id="display_name" name = "display_name" type="text" class="form-control" value="{{ $role->display_name }}" required>
             @if ($errors->has('display_name'))
                <span class="help-block">
                 <strong>{{ $errors->first('display_name') }}</strong>
                </span>
             @endif
        </div>


        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description">Description</label>
         
            <textarea id="description" name = "description" type="text" class="form-control" required>{{ $role->description }}</textarea>
             @if ($errors->has('description'))
                <span class="help-block">
                 <strong>{{ $errors->first('description') }}</strong>
                </span>
             @endif
        </div>


<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Assign Permissions</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="box-body">
 


        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
       
          @foreach($permission as $value)
            <input type="checkbox" name="permission[]" value="{{$value->id}}" @if( in_array($value->id, $rolePermissions) ) checked="1" @endif />{{ $value->display_name }}<br>
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