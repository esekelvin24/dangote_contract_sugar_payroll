@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')



<div class="container-fluid">

    <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">{{$department_name}}</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li class="active"><span>Departmental Monthly Payroll</span></li>
                <li class="active"><span>{{$department_name}}</span></li>
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
                                            
<!--
                                            <div class="row">

                                                    

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

                                                    
                                                   
													
                                                    <div class="col-lg-3" >
                                                        
                                                            <div class="form-group mb-0" style="margin-top:30px">
                                                                <button onclick="do_filter()" type="button" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                                            </div>
                                                        </div>
                                                </div>-->
                                                <div class="row">

                                                        

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
                                                    
                                                    <th class="">Staff ID</th>
                                                    <th class="">Staff Name</th>
                                                    <th class="exportable">Department</th>
                                                    <th class="exportable">Month</th>
                                                    <th class="exportable">Gross</th>
                                                    <th class="exportable">Payee</th>
                                                    <th class="exportable">Overtime Days</th>
                                                    <th class="exportable">Overtime Pay</th>
                                                    <th class="exportable">Absent</th>
                                                    <th class="exportable">Absent Deduction</th>
                                                    <th class="exportable">Advance</th>
                                                    <th class="exportable">Arrears</th>
                                                    <th class="exportable">Net</th>
                                                    <th class="exportable">Bank</th>
                                                    <th class="exportable">Account</th>
                                                    <th class="exportable">Acc. No.</th>
                                                    <th class="exportable">Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    
                                                    <th>Staff ID</th>
                                                    <th >Staff Name</th>
                                                    <th>Department</th>
                                                    <th>Month</th>
                                                    <th>Gross</th>
                                                    <th>Payee</th>
                                                    <th>Overtime Days</th>
                                                    <th>Overtime Pay</th>
                                                    <th>Absent</th>
                                                    <th>Absent Deduction</th>
                                                    <th>Advance</th>
                                                    <th>Arrears</th>
                                                    <th>Net</th>
                                                    <th>Bank</th>
                                                    <th>Account</th>
                                                    <th>Acc. No.</th>
                                                    <th >Action</th>
                                                        
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
                            url: SITEURL + '/payroll-list/payroll-id/{{$payroll_id}}',
                            type: 'GET',
                            "data": function ( d,l ) {
                            d.start_date   = $('#start_date').val();
                            d.end_date   = $('#end_date').val();
                            //d.start_date   = "2019-09-02 00:00";
                            //d.end_date   = "2019-09-02 23:59";
 
                            }

                        },
                        
                        columns: [

                             
                            
                            {data: 'staff_id', name: 'staff_id'},    
                            {data: null,
                            render: function(data){
                                return (data.first_name ==null?"":data.first_name) + " " + (data.other_name ==null?"":data.other_name) + " " + (data.lastname ==null?"":data.lastname);
                                // return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },        
                            
                            {data: 'department_name', name: 'department_name', orderable: false, searchable: false},
                            {data: 'month_of', name: 'month_of'},
                            {data: null,
                            render: function(data){
                                 
                                var number = numeral(data.gross_salary);
                                var amt = number.format('0,0.00');

                                return {{-- "&#8358;" + --}} amt;
                             //return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },
                            {data: null,
                            render: function(data){
                                 
                                var number = numeral(data.payee);
                                var amt = number.format('0,0.00');

                                return {{-- "&#8358;" + --}} amt;
                             //return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },
                            {data: 'overtime_hrs', name: 'overtime_hrs'},
                            {data: null,
                            render: function(data){
                                 
                                var number = numeral(data.overtime_pay);
                                var amt = number.format('0,0.00');

                                return {{-- "&#8358;" + --}} amt;
                             //return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },
                            {data: 'absence_from_work', name: 'absence_from_work'},
                            {data: null,
                            render: function(data){
                                 
                                var number = numeral(data.absent_deduction);
                                var amt = number.format('0,0.00');

                                return {{-- "&#8358;" + --}} amt;
                             //return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },
                            
                            {data: null,
                            render: function(data){
                                 
                                var number = numeral(data.advance);
                                var amt = number.format('0,0.00');

                                return {{-- "&#8358;" + --}} amt;
                             //return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },
                            {data: null,
                            render: function(data){
                                 
                                var number = numeral(data.arrears);
                                var amt = number.format('0,0.00');

                                return {{-- "&#8358;" + --}} amt;
                             //return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },
                            {data: null,
                            render: function(data){
                                 
                                var number = numeral(data.monthly_net);
                                var amt = number.format('0,0.00');

                                return {{-- "&#8358;" + --}} amt;
                             //return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },
                            {data: 'bank', name: 'bank'},
                            {data: 'account_name', name: 'account_name'},
                            {data: 'account_number', name: 'account_number'},
                            
                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var view_button = '<a id="' + data.cat_group_id + '" href="'+SITEURL+'/payroll-list/payroll-id/{{$payroll_id}}/staff/' + data.cat_group_id + '/" class="text-primary"><icon class="fa fa-eye"></icon> Details </a>'
                                    return view_button;
                                }
                            }
                                ], dom : 'Bfrtip',
                                buttons: [
                                    {
                                        extend: 'print',
                                        exportOptions: {
                                            columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15] //by class selector
                                        }
                                    }
                                 , 
                                 {
                                    title: 'Departmental Payroll Breakdown',
                                    extend: 'pdfHtml5',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL',
                                    text: '<i class="fa fa-file-pdf-o"> PDF</i>',
                                    titleAttr: 'PDF',
                                    exportOptions: {
                               
                                        columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15] //by class selector
                                        },
                                },  {
                                        extend: 'excel',
                                        exportOptions: {
                                            columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15] //by class selector
                                        }
                                    }
                                 , 


                                
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

                


        
        </script>


@endsection 