@extends('layouts.datatable-adminlte2-4-0')
@section('title') Create New Role @endsection
@section('content')  

<section class="content-header">
      <h1>
         Edit Group 
      </h1>
        <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li><a href="{{ url('/manage_groups') }}"><i class="fa fa-archive" style="color: blue;"></i> Manage Groups</a></li>
        <li class="active">Edit New Group </li>
      </ol>
</section>

<section class="content">
    <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit New Group</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <div class="row">
              <div class="box-body">
  
    <form method = 'POST' action = '{!!url("store_edit_group")!!}' enctype="multipart/form-data">
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group{{ $errors->has('group_name') ? ' has-error' : '' }}">
        <input type="hidden" name="group_id" id="group_id" value="{{$collections->group_id}}" >
            <label for="name">Name</label>
            <input id="group_name" name = "group_name" type="text" class="form-control" value="{{$collections->group_name}}" required>
              @if ($errors->has('group_name'))
                <span class="help-block">
                 <strong>{{ $errors->first('group_name') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group{{ $errors->has('group_description') ? ' has-error' : '' }}">
            <label for="group_description">Description</label>
         
            <textarea id="group_description" name = "group_description" type="text" class="form-control"  required>{{$collections->description}}</textarea>
             @if ($errors->has('group_description'))
                <span class="help-block">
                 <strong>{{ $errors->first('group_description') }}</strong>
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

<script type="text/javascript">
  var $inputs = $('select.company_id');
$('#role_id').change(function(){
  $inputs.prop('disabled', $(this).val() != '2');
  $inputs.prop('required', $(this).val() === '2');
  $inputs.prop('reset', $(this).val() === '2');
});
</script>

@endsection