@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')


<div class="container-fluid">

    <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Staff Attendance List</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="index.html">Dashboard</a></li>
                <li class="active"><span>Staff Attendance List</span></li>
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
                                    <div class="table-responsive">
                                            

                                            <div class="row">

                                                    <div class="col-lg-2">
                                                            <div class="form-group mb-0">
                                                                <label class="control-label mb-10 text-left">Date Filter</label>
                                                                
                                                                <select id="date_filter" name="date_filter" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option value="created">Created Date</option>
                                                                    <option value="clockin">Clockin Date</option>
                                                                </select>
                                                            </div>
                                                    </div>

													<div class="col-lg-2" style="max-width:130px !important;">
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
                                                    </div>

                                                    <div class="col-lg-2">
                                                            <div class="form-group mb-0">
                                                                <label class="control-label mb-10 text-left">Sheet ID</label>
                                                            <input type="text" class="form-control input-daterange-timepicker" id="sheet_id" name="sheet_id" value="{{isset($sheet_id)?$sheet_id:''}}">
                                                            </div>
                                                        </div>
                                                    
                                                    <div class="col-lg-2">
                                                            <div class="form-group mb-0">
                                                                <label class="control-label mb-10 text-left">Department</label>
                                                                
                                                                <select id="department_id" name="department_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                    
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
													
                                                    <div class="col-lg-3" >
                                                        
                                                            <div class="form-group mb-0" style="margin-top:30px">
                                                                <button onclick="do_filter()" type="button" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">

                                                        

                                                </div>
                                                
                                                <div>
                                                
                                                </div>
                                        
                                        <div style="padding-top:5px;" class="input-group-btn">
                                            
                                                <button style="display:none" id="button-group" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a onclick="take_action_blk('')" href="javascript:void(0)">Delete</a></li>
                                                </ul>
                                        </div>




                                        <table id="datable_1" class="table table-hover display  pb-30" >
                                            <thead>
                                                <tr>
                                                    <th><div class="checkbox"><input type="checkbox" name="chkall" id="allcb"><label for="checkbox1"></label></div></th>
                                                    <th>Sheet ID</th>
                                                    <th>Staff ID</th>
                                                    <th>Staff Name</th>
                                                    <th>Department</th>
                                                    <th>Day</th>
                                                    <th>Cockin Date</th>
                                                    <th>Early In</th>
                                                    <th>Late In</th>
                                                    <th>Late Out</th>
                                                    <th>Late Out</th>
                                                    <th>Created By</th>
                                                    <th>Created</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                        <th></th>
                                                        <th>Sheet ID</th>
                                                        <th>Staff ID</th>
                                                        <th>Staff Name</th>
                                                        <th>Department</th>
                                                        <th>Day</th>
                                                        <th>Cockin Date</th>
                                                        <th>Early In</th>
                                                        <th>Late In</th>
                                                        <th>Late Out</th>
                                                        <th>Late Out</th>
                                                        <th>Created By</th>
                                                        <th>Created</th>
                                                        
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                   
                                                </tr>
                                               
                                          
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
                     // serverSide: true,
                        ajax: {
                            url:'{{ route("19~/time-sheet-attendance-list") }}',
                            type: 'GET',
                            "data": function ( d,l ) {
                            d.start_date   = $('#start_date').val();
                            d.end_date   = $('#end_date').val();
                            d.department = $('#department_id').val();
                            d.sheet_id = $('#sheet_id').val();
                            d.date_filter = $('#date_filter').val();
                            //d.start_date   = "2019-09-02 00:00";
                            //d.end_date   = "2019-09-02 23:59";
 
                            }

                        },
                        columns: [

                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var checkbox = '<div class="checkbox"><input onClick="ff()" value="'+ data.sheet_id +'" type="checkbox"><label for="checkbox1"></label></div>';
                                    return checkbox;
                                }
                            }, 
                            {data: 'sheet_id', name: 'sheet_id'}, 
                            {data: 'staff_id', name: 'staff_id'},    
                            {data: null,
                            render: function(data){
                                return (data.first_name ==null?"":data.first_name) + " " + (data.other_name ==null?"":data.other_name) + " " + (data.lastname ==null?"":data.lastname);
                                // return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },        
                            
                            {data: 'department_name', name: 'department_name', orderable: false, searchable: false},
                            {data: 'day', name: 'day'},
                            {data: 'attendance_date', name: 'attendance_date'},
                            {data: 'early_in', name: 'early_in'},
                            {data: 'early_out', name: 'early_out'},
                            {data: 'late_in', name: 'late_in'},
                            {data: 'late_out', name: 'late_out'},
                            {data: 'created_by', name: 'created_by'},
                            {data: 'created_at', name: 'created_at', orderable: false,searchable: false}
                                ]
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
                        url: SITEURL + "/designation-list/delete/"+app_ids,
                        success: function (data) {
                            $('#datable_1').DataTable().ajax.reload();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });

                }

                


        
        </script>


@endsection 