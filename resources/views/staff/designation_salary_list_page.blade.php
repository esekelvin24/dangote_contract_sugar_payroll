@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')


<div class="container-fluid">

    <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Monthly Grows Salary by Position</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="/dashboard">Dashboard</a></li>
                <li class="active"><span>Monthly Gross Salary</span></li>
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
                                            
                                           {{-- <div class="row">
												<!--	<div class="col-lg-2" style="max-width:130px !important;">
														<div class="form-group mb-0">
															<label class="control-label mb-10 text-left">Start Date</label>
															<input class="form-control input-daterange-datepicker" type="text" id="start_date" name="start_date" value="">
														</div>
													</div>
													<div class="col-lg-2" style="max-width:130px !important;">
														<div class="form-group mb-0">
															<label class="control-label mb-10 text-left">End Date</label>
															<input type="text" class="form-control input-daterange-timepicker" id="end_date" name="end_date" value="">
														</div>
                                                    </div> -->

                                                    <div class="col-lg-2">
                                                        <div class="form-group mb-0">
                                                            <label class="control-label mb-10 text-left">Department</label>
                                                            
                                                            <select required id="department_id" name="department_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                
                                                            <option value="">Choose a Department</option>
                                                             @if(count($dept_array_list) > 0)
                                                               @foreach ($dept_array_list as $dept)
                                                               {{$dept_id = isset($dept_id)?$dept_id:""}}
                                                            <option {{ $dept->department_id == $dept_id ?"selected":"" }} value="{{$dept->department_id}}">{{$dept->department_name}}</option>
                                                               
                                                                @endforeach
                                                             @endif
                                                                 
                                                             
                                                            </select>
                                                        </div>
                                                      </div>
                                                    
                                                    <div class="col-lg-2">
                                                            <div class="form-group mb-0">
                                                                <label class="control-label mb-10 text-left">Staff Type</label>
                                                                <select id="staff_type" name="staff_type" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                       <option value="">All Staff</option>
                                                                @if(count($staff_type) > 0)
                                                                   @foreach($staff_type as $type)
                                                                        <option value="{{$type->staff_type_id}}">{{$type->staff_type_name}}</option>
                                                                  @endforeach
                                                                @endif
                                                            </select>
                                                            </div>
                                                    </div>
													
                                                    <div class="col-lg-3" >
                                                        
                                                            <div class="form-group mb-0" style="margin-top:30px">
                                                                <button onclick="do_filter()" type="button" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                                            </div>
                                                        </div>
												</div> --}}
                                        
                                        <div style="padding-top:5px;" class="input-group-btn">
                                            
                                                <button style="display:none" id="button-group" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span>
                                                <ul class="dropdown-menu">
                                                    <li><a onclick="take_action_blk('')" href="javascript:void(0)">Delete</a></li>
                                                </ul>
                                        </div>

                                        <div class="row">
                                            <br>
                                            <div class="col-lg-2">
                                                <div class="form-group mb-0">
                                                     <div style="padding-top:5px;" class="">   
                                                            <a class="btn btn-success" href="{{url("/designation-salary-list/new/create")}}"><i class="icon-plus mr-20"></i>Add New Salary</a>
                                                       </div>
                                                </div>
                                            </div>
                                        </div>



                                        <table id="datable_1" class="table table-hover display  pb-30" >
                                            <thead>
                                                <tr>
                                                    <th><div class="checkbox"><input type="checkbox" name="chkall" id="allcb"><label for="checkbox1"></label></div></th>
                                                    <th>Position Name</th>
                                                    <th>Department</th>
                                                    <th>Staff Type</th>
                                                    <th>Gross Salary</th>
                                                    <th>Created By</th>
                                                    <th>Created</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                        <th></th>
                                                        <th>Position Name</th>
                                                        <th>Department</th>
                                                        <th>Staff Type</th>
                                                        <th>Gross Salary</th>
                                                        <th>Created By</th>
                                                        <th>Created</th>
                                                        <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($data as $val)
                                                <tr>
                                                    <td><div class="checkbox"><input onClick="ff()" value="{{$val->designation_id}}" type="checkbox"><label for="checkbox1"></label></div></td>
                                                    <td>{{$val->designation_name}}</td>
                                                    <td>{{$val->department_name}}</td>
                                                    <td>{{$val->staff_type_name}}</td>
                                                    <td>{{$val->monthly_amount}}</td>
                                                    <td>{{$val->created_by}}</td>
                                                    <td>{{$val->created}}</td>
                                                    <td><a id="{{$val->designation_id}}" href="{{url('/designation-salary-list/update/'.$val->designation_id)}}"  class="text-primary"><icon class="fa fa-pencil"></icon> Edit</a> | 
                                                    <a id="{{$val->designation_id}}" href="{{url('/designation-salary-list/delete/'.$val->designation_id.'~'.$val->salary_desc_code)}}"  class="text-danger"><icon class="fa fa-trash"></icon> Delete</a></td>
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

       table = $('#datable_1').DataTable({
                        processing: true,
                         });

    /*   function  do_filter()
        {
           $('#datable_1').DataTable().ajax.reload();
        }

      function create_dt()
      {
          table = $('#datable_1').DataTable({
                        processing: true,
                     // serverSide: true,
                        ajax: {
                            url: SITEURL + '/designation-salary-list',
                            type: 'GET',
                            "data": function ( d,l ) {
                            d.start_date   = $('#start_date').val();
                            d.end_date   = $('#end_date').val();
                            d.staff_type = $('#staff_type').val();
                            d.department_id = $('#department_id').val();
                            //d.start_date   = "2019-09-02 00:00";
                            //d.end_date   = "2019-09-02 23:59";
 
                            }

                        },
                        columns: [

                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var checkbox = '<div class="checkbox"><input onClick="ff()" value="'+ data.designation_id +'" type="checkbox"><label for="checkbox1"></label></div>';
                                    return checkbox;
                                }
                            },           
                            {data: 'designation_name', name: 'designation_name'},
                            {data: 'department_name', name: 'department_name'},
                            {data: 'staff_type_name', name: 'staff_type_name'},
                            {data: 'monthly_amount', name: 'monthly_amount'},
                            {data: 'created_by', name: 'created_by', orderable: false, searchable: false},
                            {data: 'created_at', name: 'created_at', orderable: false,searchable: false},
                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var edit_button = '<a id="' + data.designation_id + '" href="'+SITEURL+'/designation-salary-list/update/'+data.designation_id+'"  class="text-primary"><icon class="fa fa-pencil"></icon> Edit</a>'; 
                                    var delete_button = '<a id="' + data.designation_id + '" onclick="take_action_blk(\''+data.designation_id+'\')" href="javascript:void(0)" class="text-danger"><icon class="fa fa-trash"></icon> Delete</a>';
                                    return edit_button + " | " + delete_button;
                                }
                            }

                                ]
                        });
        }// end of load functions

*/
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

                


        
        </script>
     
<script>



            @if(Session::get('success'))
            
                  swal({ 
                        title: "Successful",   
                        icon: "success", 
                        text: "{{session::get('success')}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        

                    });

                
            @endif

             @if(Session::get('error'))
           
                swal({ 
                        title: "Error",   
                        icon: "warning", 
                        text: "{{session::get('error')}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        

                    });

           @endif
</script>

@endsection 