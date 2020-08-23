@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')
@php
    //$designation_id = isset($designation_id)?$designation_id:"";
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container-fluid">

        <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">New Position</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/designation-list">Position List</a></li>
                    <li class="active"><span>New Position</span></li>
                </ol>
                </div>
                <!-- /Breadcrumb -->
        </div>
        



        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form  method="POST" action="{{url('/designation-list/save')}}">

                                                @csrf
                                                <div class="form-body">
                                                    <input type="hidden" id="op" name="op" value="{{$op}}" />
                                                    <input type="hidden" id="designation_id" name="designation_id" value="{{$designation_id}}" />
                                                    <div class="row">
                                                            <div style="max-width:208px !important;" class="col-md-6">
                                                                    <div class="form-group @error('new_date') has-error @enderror">
                                                                        <span class="txt-danger" style="font-size:19px;">*</span> <label class="control-label mb-10">Position Name</label>
                                                                        <input value="{{$designation_name==""?"":$designation_name}}" type="text" id="designation_name" name="designation_name" class="form-control"  placeholder="Enter position name" required autofocus>
                                                                        @error('new_date')
                                                                            <span class="help-block" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-2">
                                                                    <div class="form-group mb-0">
                                                                        <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10 text-left">Department</label>
                                                                        
                                                                        <select required id="department_id" name="department_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                            
                                                                        <option value="">Choose a Department</option>
                                                                         @if(count($dept_array_list) > 0)
                                                                           @foreach ($dept_array_list as $dept)
                                                                           {{$dept_id = isset($dept_id)?$dept_id:""}}
                                                                        <option {{ $dept->department_id == $department_id ?"selected":"" }} value="{{$dept->department_id}}">{{$dept->department_name}}</option>
                                                                           
                                                                            @endforeach
                                                                         @endif
                                                                            
                                                                         
                                                                        </select>
                                                                    </div>
                                                                  </div>

                                                                  <div class="col-lg-2">
                                                                    <div class="form-group mb-0">
                                                                        <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10 text-left">Job Category</label>
                                                                        
                                                                        <select required id="category_id" name="category_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                            
                                                                        <option value="">Choose a Job Category</option>
                                                                         @if(count($cat_array_list) > 0)
                                                                           @foreach ($cat_array_list as $cat)
                                                                           {{$dept_id = isset($dept_id)?$dept_id:""}}
                                                                        <option {{ $cat->category_id == $category_id ?"selected":"" }}  value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                                                           
                                                                            @endforeach
                                                                         @endif
                                                                            
                                                                         
                                                                        </select>
                                                                    </div>
                                                                  </div>
                                                         
                                                       
                                                    

                                                            
                                                            <div style="max-width:185px !important;" class="col-md-6">
                                                                <div class="form-group @error('password') has-error @enderror">
                                                                    <label class="control-label mb-10"><br/><br/><br/></label>
                                                                    <button type="submit" class="btn btn-info">
                                                                        {{ $op=="update"?"Update":"Create" }}
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            
                                                            
                                                        </div>
                                                        <!-- /Row -->


                                                </div>
                                    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>		
                </div>
            </div>
           
<script>



            if ("{{$code}}" == "200")
            {
                  swal({ 
                        title: "Successful",   
                        icon: "success", 
                        text: "{{$message}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        

                    });

                
            }else if ("{{$code}}" != "200" && "{{$code}}" != "none")
            {
                swal({ 
                        title: "Error",   
                        icon: "warning", 
                        text: "{{$message}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        

                    });

            }
</script>

@endsection 