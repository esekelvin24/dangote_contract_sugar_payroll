@extends('layouts.datatable-adminlte2-4-0')
@section('title') Create New Permission @endsection
@section('content')  

<section class="content-header">
      <h1>
         Create New Permission 
      </h1>
        <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
         <li><a href="{{ url('/manage_permissions') }}"><i class="fa fa-key" style="color: blue;"></i> Manage Permissions</a></li>
        <li class="active">Create New Permission </li>
      </ol>
</section>

<section class="content">
    <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Permission</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <div class="row">
              <div class="box-body">
  
    <form method = 'POST' action = '{!!url("store_permission")!!}' enctype="multipart/form-data">
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{{ old('name') }}" required>
              @if ($errors->has('name'))
                <span class="help-block">
                 <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
            <label for="display_name">Display Name</label>
            <input id="display_name" name = "display_name" type="text" class="form-control" value="{{ old('display_name') }}" required>
             @if ($errors->has('display_name'))
                <span class="help-block">
                 <strong>{{ $errors->first('display_name') }}</strong>
                </span>
             @endif
        </div>


        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description">Description</label>
         
            <textarea id="description" name = "description" type="text" class="form-control" value="{{ old('description') }}" required></textarea>
             @if ($errors->has('description'))
                <span class="help-block">
                 <strong>{{ $errors->first('description') }}</strong>
                </span>
             @endif
        </div>


            <button type="submit" class="btn bg-blue">Submit</button>

    </section>
  </div>
</div>
    </div>

        
         </form>
    </div></div></div></div></div>
</section>


@endsection