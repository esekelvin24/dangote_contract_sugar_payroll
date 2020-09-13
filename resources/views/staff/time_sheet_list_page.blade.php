@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')



<div class="container-fluid">

    <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Time Sheet Weekly List</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li class="active"><span>Time Sheet List</span></li>
            </ol>
            </div>
            <!-- /Breadcrumb -->
    </div>



    
    		<!-- Row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <!-- <h6 class="panel-title txt-dark">Menu Table</h6> -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table- responsive">
                                        <form method="GET" action="">
                                        @csrf
                                            <div class="row">
                                                    
                                                    {{--<div class=" col-sm-2" style="max-width:130px !important;">
                                                        <div class="form-group mb-0">
                                                            <label class="control-label mb-10 text-left">Start Date</label>
                                                            <input class="form-control input-daterange-datepicker" type="text" id="start_date" name="start_date" value="{{isset($request->start_date)?$request->start_date:''}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2" style="max-width:130px !important;">
                                                        <div class="form-group mb-0">
                                                            <label class="control-label mb-10 text-left">End Date</label>
                                                            <input type="text" class="form-control input-daterange-timepicker" id="end_date" name="end_date" value="{{isset($request->end_date)?$request->end_date:''}}">
                                                        </div>
                                                    </div>--}}
                    
                                                    <div class="col-lg-2" style="max-width:180px !important;">
                                                            <div class="form-group mb-0">
                                                                <label class="control-label mb-10 text-left">Department</label>
                                                                
                                                                <select onchange="get_section(this.value)" id="department_id" name="department_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                    
                                                                <option value="">All Department</option>
                                                                 @if(count($dept_array_list) > 0)
                                                                   @foreach ($dept_array_list as $dept)
                                                                   {{$dept_id = isset($dept_id)?$dept_id:""}}
                                                                <option {{ $dept->department_id == $dept_id ?"selected":"" }} value="{{$dept->department_id}}">{{$dept->department_name}}</option>
                                                                   
                                                                    @endforeach
                                                                 @endif
                                                                    
                                                                 
                                                                </select>
                                                            </div>
                                                    </div>
                    
                                                    <div class="col-lg-2" style="max-width:200px !important;">
                                                        <div class="form-group mb-0">
                                                            <label class="control-label mb-10 text-left">Section</label>
                                                            <select  id="section_id" name="section_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                <option value="">All Section</option>
                                                            </select>
                                                        </div>
                                                     </div>
                    
                                                    <div class="col-lg-2" style="max-width:185px !important;">
                                                        <div class="form-group mb-0">
                                                            <label class="control-label mb-10 text-left">Staff Type</label>
                                                            <select id="staff_type" name="staff_type" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                   <option value="">All Staff</option>
                                                            @if(count($staff_type) > 0)
                                                               @foreach($staff_type as $type)
                                                                    <option {{ $type->staff_type_id == $staff_type_id ?"selected":"" }}   value="{{$type->staff_type_id}}">{{$type->staff_type_name}}</option>
                                                              @endforeach
                                                            @endif
                                                        </select>
                                                        </div>
                                                    </div>
                    
                                                    
                    
                                                     
                    
                                                    
                                                    <div class="col-lg-1" >
                                                        
                                                            <div class="form-group mb-0" style="margin-top:30px">
                                                                <button  type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                                            </div>
                                                    </div>
                                                 </form>       
                                                    
                    
                                                    
                    
                    
                                        </div>
                                            
                                           
                                        
                                        <div style="padding-top:5px;" class="input-group-btn">
                                            
                                                <button style="display:none" id="button-group" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a onclick="take_action_blk('')" href="javascript:void(0)">Delete</a></li>
                                                </ul>
                                        </div>
                                        <div class="row">
                                            <br/>
                                            <div class="col-lg-2">
                                                <div class="form-group mb-0">
                                                     <div style="padding-top:5px;" class="">   
                                                            <a class="btn btn-success" href="{{url("/capture-time-sheet-list/create/new")}}"><i class="icon-plus mr-20"></i>New Entry</a>
                                                       </div>
                                                </div>
                                            </div>
                                        </div>



                                        <table id="datable_1" class="table table-hover display  pb-30" >
                                            <thead>
                                                <tr>
                                                    <th><div class="checkbox"><input type="checkbox" name="chkall" id="allcb"><label for="checkbox1"></label></div></th>
                                                    
                                                    <th>Department</th>
                                                    <th>Section</th>
                                                    <th>Staff Type</th>
                                                    <th>Week Date</th>
                                                    <th>Expired At</th>
                                                    <th>Status</th>
                                                    <th>No of days</th>
                                                    <th>Created</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                        <th></th>
                                                        
                                                        <th>Department</th>
                                                        <th>Section</th>
                                                        <th>Staff Type</th>
                                                        <th>Week Date</th>
                                                        <th>Expired At</th>
                                                        <th>Status</th>
                                                        <th>No of days</th>
                                                        <th>Created</th>
                                                        <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                         

                                            @foreach($timesheet as $val)
                                                <tr>
                                                    
                                                    <td><div class="checkbox"><input onClick="ff()" value="{{$val->sheet_id}}" type="checkbox"><label for="checkbox1"></label></div></td>
                                                    <td>{{$val->department_name}}</td>
                                                    
                                                    <td>{{$val->section_name}}</td>
                                                    <td>{{$val->staff_type_name}}</td>
                                                    <td>{{$val->started_at}}</td>
                                                    <td>{{$val->expired_at}}</td>
                                                    @if($val->status == 1)
                                                    <td style="color:green">Openned</td>
                                                    @else
                                                    <td style="color:red">Closed</td>
                                                    @endif

                                                    <td>{{((strtotime($val->expired_at) - strtotime($val->started_at)) / (60 * 60 * 24))+ 1}}</td>
                                                    <td>{{$val->created}}</td>
                                                    <td>
                                                    
                                                    
                                                       <a id="{{$val->sheet_id}}" href="{{url('/time-sheet-staff-list/'.$val->sheet_id )}}" class="text-primary"><icon class="fa fa-eye"></icon> View </a>

                                                       
                                                       <a id="{{$val->sheet_id}}" href="{{url('/time-sheet-list/'.$val->sheet_id.'/add-timesheet-record')}}" class="text-success"><icon class="fa fa-pencil"></icon> Update </a>
                                                       <a id="{{$val->sheet_id}}" onclick="take_action_blk('{{$val->sheet_id}}')" href="javascript:void(0)" class="text-danger"><icon class="fa fa-trash"></icon> Delete </a>
                                    
                                                    </td>
                                                   
                                                </tr>

                                            @endforeach
                                               
                                          
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
            <!-- /Row -->

</div>


<script>

       
        var SITEURL = '{{URL::to('')}}';
        var table = '';

        $(document).ready(function() {
    
        var myCalendar;
	    myCalendar = new dhtmlXCalendarObject(["start_date","end_date"]);
    
            "use strict";
            
              //  load_data();

                //checking of all buttons on the datatable list
                $('#allcb').change(function(){

                    if($(this).prop('checked')){
                        var cnt = 0;
                        $('tbody tr td input[type="checkbox"]').each(function(){
                            $(this).prop('checked', true);
                            cnt++;
                        });
                        $("#button-group").show();
                        $("#button-group").text('Take action on '+cnt+' record(s) ' );
                    }else{
                        $('tbody tr td input[type="checkbox"]').each(function(){
                            $(this).prop('checked', false);
                        });
                        $("#button-group").hide();
                        $("#button-group").text("");
                    }
		        });   
        
                create_dt();
      
      
    } );

       var table ="";

       function  do_filter()
        {
           $('#datable_1').DataTable().ajax.reload();
        }

      function create_dt()
      {
          table = $('#datable_1').DataTable({
                        processing: true,
                        order: [[ 7, "desc" ]],
                     // serverSide: true,
                       
                        });
        }// end of load functions

       
            //individual checking of checkbox
                function ff()
                {
                    var cnt = 0;
                    $('tbody tr td input[type="checkbox"]').each(function(){
                        if($(this).is(':checked'))
                            {
                                cnt++;
                            }
                        });
                    if(cnt > 0)
                        {
                            $("#button-group").show();
                            $("#button-group").text("Take action on "+cnt+" records(s)");
                        }else{
                            $("#button-group").hide();
                            $("#button-group").text("");
                        }
                }

                //bulk actions of selected checkbox
                function take_action_blk(id)
                {
                    let app_ids = "";

                    if(id !="")
                    {
                        app_ids = id;
                    }else
                    {

                        
                        
                        $('tbody tr td input[type="checkbox"]').each(function(){
                            if($(this).is(':checked'))
                                {
                                    app_ids = app_ids+""+$(this).val()+",";
                                }
                        });
                    }
                    
                    //alert(app_ids);

                    $.ajax({
                        type: "get",
                        url: SITEURL + "/time-sheet-list/delete/"+app_ids,
                        success: function (data) {

                           window.location.reload();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });

                }

                function get_section(value)
                  {  
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    type:'GET',
                    url: SITEURL + '/section-list/'+value,
                    
                    success:function(response){
                        //alert(response);
                        $('#section_id').html(response);
                    }

                });
                  }

                @if (Session::get('error'))
                        swal({ 
                                        title: "Error",   
                                        icon: "warning", 
                                        text: "{{Session::get('error')}}",
                                        confirmButtonColor: "#469408",   
                                    }).then((value) => {

                                        

                        });
                @endif
        
        </script>


@endsection 