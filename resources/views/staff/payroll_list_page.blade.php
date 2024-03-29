@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')


<div class="container-fluid">

    <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Departmental Monthly Payroll</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li class="active"><span>Departmental Monthly Payroll</span></li>
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
                                            

                                            <div class="row">

                                                    <div style="max-width:165px !important;" class="col-lg-2">
                                                            <div class="form-group mb-0">
                                                                <label class="control-label mb-10 text-left">Date Filter</label>
                                                                
                                                                <select id="date_filter" name="date_filter" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option value="created">Created Date</option>
                                                                    <option value="clockin">Month</option>
                                                                </select>
                                                            </div>
                                                    </div>

													<div style="max-width:130px !important;" class="col-lg-2">
														<div class="form-group mb-0">
															<label class="control-label mb-10 text-left">Start Date</label>
															<input class="form-control input-daterange-datepicker" type="text" id="start_date" name="start_date" value="">
														</div>
													</div>
													<div style="max-width:130px !important;" class="col-lg-2">
														<div class="form-group mb-0">
															<label class="control-label mb-10 text-left">End Date</label>
															<input type="text" class="form-control input-daterange-timepicker" id="end_date" name="end_date" value="">
														</div>
                                                    </div>

                                                    <div style="max-width:135px !important;" class="col-lg-2">
                                                        <div class="form-group mb-0">
                                                            <label class="control-label mb-10 text-left">Status</label>
                                                            <select id="status" name="status" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                              <option value="">All</option>
                                                              <option value="0">Active</option>
                                                              <option value="1">Closed</option>
                                                            </select>
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
                                                    <br/>
                                                    <div class="col-lg-2">
                                                        <div class="form-group mb-0">
                                                             <div style="padding-top:5px;" class="">   
                                                                    <a class="btn btn-success" href="{{url("/payroll-generation/create")}}"><i class="icon-plus mr-20"></i>New Entry</a>
                                                               </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                
                                                </div>
                                        
                                        <div style="padding-top:5px;" class="input-group-btn">
                                            
                                                <button style="display:none; margin-bottom:4px;" id="button-group" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a onclick="take_action_blk('')" href="javascript:void(0)">Delete</a></li>
                                                </ul>
                                        </div>
                                        <div id="button"></div>



                                        <table id="datable_1" class="table table-hover display  pb-30" >
                                            <thead>
                                                <tr>
                                                    <th><div class="checkbox"><input type="checkbox" name="chkall" id="allcb"><label for="checkbox1"></label></div></th>
                                                    
                                                    <th>Department</th>
                                                    <th>Staff Type</th>
                                                    <th>Month</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Created By</th>
                                                    <th>Created</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    
                                                    <th>Department</th>
                                                    <th>Staff Type</th>
                                                    <th>Month</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Created By</th>
                                                    <th>Created</th>
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
                        order: [[ 7, "desc" ]],
                     // serverSide: true,
                        ajax: {
                            url:SITEURL +'/departmental-payroll-list',
                            type: 'GET',
                            "data": function ( d,l ) {
                            d.start_date   = $('#start_date').val();
                            d.end_date   = $('#end_date').val();
                            d.department = $('#department_id').val();
                            d.status =  $('#status').val();
                            d.date_filter = $('#date_filter').val();
                            //d.start_date   = "2019-09-02 00:00";
                            //d.end_date   = "2019-09-02 23:59";
 
                            }

                        },
                         dom : 'Bfrtip',
                                buttons: [
                                 'excel', 
                                 {
                                    title: 'Departmental Monthly Payroll Breakdown',
                                    extend: 'pdfHtml5',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL',
                                    text: '<i class="fa fa-file-pdf-o"> PDF</i>',
                                    titleAttr: 'PDF'
                                }, 'print'
                            ],
                        columns: [

                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var checkbox = '<div class="checkbox"><input onClick="ff()" value="'+ data.department_id +'~'+data.month_of+'" type="checkbox"><label for="checkbox1"></label></div>';
                                    return checkbox;
                                }
                            }, 
                            {data: 'department_name', name: 'department_name', orderable: false, searchable: false},
                            {data: 'staff_type_name', name: 'staff_type_name', orderable: false, searchable: false},
                            {data: 'month_of', name: 'month_of'},
                            {data: null,
                            render: function(data){
                                 
                                var number = numeral(data.monthly_net);
                                var amt = number.format('0,0.00');

                                return "&#8358;" + amt;
                             //return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },
                            {data: null,
                            render: function(data){
                                if(data.status == 0) 
                                {
                                     return '<font class="txt-success">Active</font>';
                                }else  if(data.status == 1) 
                                {
                                     return '<font class="txt-danger">Closed</font>';
                                }
                              } 
                            },
                            {data: 'created_by', name: 'created_by'},
                            {data: 'created_at', name: 'created_at', orderable: false,searchable: false},
                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var add_button = '<a id="' + data.sheet_id + '" href="'+SITEURL+'/payroll-list/'+data.payroll_id+'/update" class="text-success"><icon class="fa fa-pencil"></icon> Update </a>';
                                    var view_button = '<a id="' + data.cat_group_id + '" href="'+SITEURL+'/payroll-list/payroll-id/' + data.payroll_id + '/" class="text-primary"><icon class="fa fa-eye"></icon> View </a>'
                                    return view_button + (data.status==0?" | " + add_button:"");
                                }
                            }
                                ]
                        });

                        table.buttons().container().appendTo($('#button', table.table().container()));   
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