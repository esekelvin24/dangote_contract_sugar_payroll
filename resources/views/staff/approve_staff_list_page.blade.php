@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')


<div class="container-fluid">

    <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Approve Staff</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li class="active"><span>Approve Staff</span></li>
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

                        <div class="row">
                                <div class=" col-sm-2" style="max-width:130px !important;">
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
                                        <select required id="section_id" name="section_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
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
                                                <option value="{{$type->staff_type_id}}">{{$type->staff_type_name}}</option>
                                          @endforeach
                                        @endif
                                    </select>
                                    </div>
                                </div>

                               

                                 

                                
                                <div class="col-lg-1" >
                                    
                                        <div class="form-group mb-0" style="margin-top:30px">
                                            <button onclick="do_filter()" type="button" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                        </div>
                                </div>
                                    
                                

                                


                    </div>
                    
                    <div class="row" align="left" >
                        <div style="padding-top:10px; padding-left:15px;" class="input-group-btn">
                                
                                    <button style="display:none" id="button-group" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a onclick="take_action_blk('1')" href="javascript:void(0)">Approve</a></li>
                                    </ul>
                            </div>

                        

                    </div>

                    
                        
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table table-hover display  pb-30" >
                                            <thead>
                                                <tr>
                                                    <th><div class="checkbox"><input type="checkbox" name="chkall" id="allcb"><label for="checkbox1"></label></div></th>
                                                   
                                                    <th>Staff ID</th>
                                                        <th>Staff Type</th>
                                                        <th>Staff Name</th>
                                                        
                                                        <th>Department</th>
                                                        <th>Section</th>
                                                        <th>Position</th>
                                                        <th>Status</th>
                                                        <th>Created By</th>
                                                        <th>Created At</th>
                                                    
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                        <th></th>
                                                        <th>Staff ID</th>
                                                        <th>Staff Type</th>
                                                        <th>Staff Name</th>
                                                        
                                                        <th>Department</th>
                                                        <th>Section</th>
                                                        <th>Position</th>
                                                        <th>Status</th>
                                                        <th>Created By</th>
                                                        <th>Created At</th>
                                                        <th></th>
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
                                                    
                                                </tr>
                                               
                                          
                                            </tbody>
                                        </table>
                                    
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
                            url: SITEURL + '/approve-staff-list',
                            type: 'GET',
                            "data": function ( d,l ) {
                            d.start_date   = $('#start_date').val();
                            d.end_date   = $('#end_date').val();
                            d.staff_type = $('#staff_type').val();
                           
                            d.status = $('#status').val();
                            d.department_id = $('#department_id').val();
                            //d.start_date   = "2019-09-02 00:00";
                            //d.end_date   = "2019-09-02 23:59";
 
                            }

                        },
                        columns: [

                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var checkbox = '<div class="checkbox"><input onClick="ff()" value="'+ data.staff_id +'" type="checkbox"><label for="checkbox1"></label></div>';
                                    return checkbox;
                                }
                            },   
                            {data: 'staff_id', name: 'staff_id'},
                            {data: 'staff_type_name', name: 'staff_type_name'},
                            {data: null,
                            render: function(data){
                                return (data.first_name ==null?"":data.first_name) + " " + (data.other_name ==null?"":data.other_name) + " " + (data.last_name ==null?"":data.last_name);
                                // return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },       
                           
                           
                            {data: 'department_name', name: 'department_name'},
                            {data: 'section_name', name: 'section_name'},
                            {data: 'designation_name', name: 'designation_name'},
                            {data: null,
                            render: function(data){
                            if(data.status == 0) 
                                       {
                                           return '<font class="txt-primary">Pending</font>';
                                       }else  if(data.status == 1) 
                                       {
                                           return '<font class="txt-success">Approved</font>';
                                       }else if (data.status == 2)
                                       {
                                           return '<font class="txt-danger">Disapproved</font>';
                                       }
                              } 
                            }, 
                            {data: 'created_by', name: 'created_by', orderable: false,searchable: false},
                            {data: 'created_at', name: 'created_at', orderable: false,searchable: false},
                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var approve = '<a id="' + data.staff_id + '" href="javascript:take_action_blk(\'' + data.staff_id + '\')" class="text-success"><icon class="fa fa-check"></icon> Approve </a>';
                                    var edit_button = '<a id="' + data.staff_id + '" href="'+SITEURL+'/staff-list-info/'+data.staff_id +'" class="text-primary"><icon class="fa fa-info"></icon> View </a>';
                                    return edit_button ;
                                }
                            }

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
                function take_action_blk(status)
                {
                    let app_ids = "";

                    

                        
                        
                        $('tbody tr td input[type="checkbox"]').each(function(){
                            if($(this).is(':checked'))
                                {
                                    app_ids = app_ids+""+$(this).val()+",";
                                }
                        });
                    
                    
                    //alert(app_ids);

                $.ajax({
                        type: "get",
                        url: SITEURL + "/staff-list/change-status/"+app_ids,
                        data: {
                            status: status
                        },
                        success: function (data) {
                            $('#datable_1').DataTable().ajax.reload();
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
                    url:SITEURL + '/section-list/'+value,
                    
                    success:function(response){
                        //alert(response);
                        $('#section_id').html(response);
                    }

                });
                  }



                


        
        </script>


@endsection 