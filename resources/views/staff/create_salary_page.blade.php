@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')

@php
    $category_id = isset($category_id)?$category_id:"";
@endphp
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container-fluid">

        <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">New Position Salary</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/designation-salary-list">Position Salary List</a></li>
                    <li class="active"><span>New Position Salary</span></li>
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
                                            <form  method="POST" action="{{url("/designation-salary/save")}}">

                                                @csrf
                                                <div class="form-body">

                                                   <input type="hidden" id="op" name="op" value="{{$op}}" />
                                                   <!-- <input type="hidden" id="desg_id" name="desg_id" value="{{$designation_id}}" /> -->

                                                    <div class="row">

                                                            <div class="col-md-3" style="max-width:250px !important;">
                                                                    <div class="form-group @error('department_id') has-error @enderror">
                                                                        <span class="txt-danger" style="font-size:19px;">*</span>   <label class="control-label mb-10">Department</label>
                                                                      <select  id="department_id" name="department_id" class="form-control" data-placeholder="Choose a Department" tabindex="1">
                                                                          
                                                                          <option value="">Choose a Department</option>
                                                                          @if(count($dept_array_list) > 0)
                                                                            @foreach ($dept_array_list as $department_arr)
                                                                                  <option {{ $department_id==$department_arr->department_id?"selected":"" }} value="{{$department_arr->department_id}}">{{$department_arr->department_name}}</option>
                                                                            @endforeach
                                                                          @endif
                                                                          
                                                                      </select>
                                                                      @error('role')
                                                                              <span class="help-block" role="alert">
                                                                                  <strong>{{ $message }}</strong>
                                                                              </span>
                                                                      @enderror
                                                                  </div>
                                                          </div>

                                                          <div class="col-lg-2">
                                                                <div class="form-group mb-0">
                                                                    <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10 text-left">Job Category</label>
                                                                    
                                                                    <select onchange="get_section(this.value)" required id="category_id" name="category_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                        
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

                                                          <div class="col-lg-2">
                                                                <div class="form-group mb-0">
                                                                    <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10 text-left">Position</label>
                                                                    <select onchange="get_desig_salary(this.value)" required id="designation_id" name="designation_id" class="form-control"  tabindex="1">
                                                                      {!!$options!!}

                                                                    </select>

                                                                    @error('designation_id')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div style="max-width:160px !important;" class="col-md-3">
                                                                            <div class="form-group @error('designation_salary') has-error @enderror">
                                                                                <span class="txt-danger" style="font-size:19px;">*</span> <label class="control-label mb-10">Position Salary</label>
                                                                                <input type="text" id="designation_salary" name="designation_salary" class="form-control" value="{{ $salary }}" required autocomplete="designation_salary"  placeholder="">
                                                                                @error('designation_salary')
                                                                                    <span class="help-block" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                
                                                        
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
    var SITEURL = '{{URL::to('')}}';

$( document ).ready(function() {
    
 var myCalendar;
	    myCalendar = new dhtmlXCalendarObject(["new_date"]);
        myCalendar.showWeekNumbers();
       // myCalendar.hideWeekNumbers();
       
        myCalendar.disableDays("month", [2,3,4,5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]);
        

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           myCalendar.attachEvent("onClick", function(date){
           var sel_date =  $('#new_date').val();

                   
                    $.ajax({
                        type:'POST',
                        url: SITEURL + '/payroll-generation/get-avail-dept',
                        data:{sel_date:sel_date},
                        success:function(response){
                         // alert(response);
                            $("#department_id").html(response);

                        }

                    });
    
              });


            });


            @if(Session::get('success'))
            
                  swal({ 
                        title: "Successful",   
                        icon: "success", 
                        text: "{{Session::get('success')}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {
  

                    });
            @endif
                
            @if(Session::get('error'))
               
                swal({ 
                        title: "Error",   
                        icon: "warning", 
                        text: "{{Session::get('error')}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {
   

                    });
           @endif
            

 function get_section(value)
{

//alert(value);
//$('#designation_salary').val() = "";
   
if ($("#department_id").val() =="")
{
                  swal({ 
                        title: "Error",   
                        icon: "warning", 
                        text: "please select a department",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        

                    });
}else
{
    var dept_id = $("#department_id").val();
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    type:'GET',
    url: SITEURL + '/department-designation-list/'+value+"/"+dept_id,
    
    success:function(response){
       // alert(response);
        $('#designation_id').html(response);
    }

    });
}


    
}

function get_desig_salary(value)
{
//alert(value);

    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    type:'GET',
    url: SITEURL + '/get-designation-salary/'+value+"/"+ $('#category_id').val(),
    
    success:function(response){
        //alert(response);
        $('#designation_salary').val(response);
    }

    });
}
</script>

@endsection 