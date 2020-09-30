@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')


<div class="container-fluid">

    <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Staff List</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li><a href="{{url('/user-list')}}">Staff List</a></li>
                <li class="active"><span>Staff Info</span></li>
            </ol>
            </div>
            <!-- /Breadcrumb -->
    </div>



    <div class="panel-wrapper collapse in">
            <div class="">
                <div class="table-wrap">
                  

    		<!-- Row -->
            <div class="row">
                    <div class="col-md-6">
                     <br>
                 
                  <div class="box box-info">
                 <div class="box-header with-border">
                   
                 
                      <a href="{{url('/edit-staff/'.$staff_details->first()->staff_id)}}"><button type="button" class="btn btn-sm btn-flat btn-default"><span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button></a>
                 
                      @if ($staff_details->first()->status == 2)
                         <a href="{{url('/enable-staff/'.$staff_details->first()->staff_id)}}"><button style="background:green !important; color:white !important;" type="button" class="btn btn-sm btn-flat btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span> Activate</button></a>
                      @endif

                      @php
                           $user = Auth::user();
                          
                        
                      @endphp

                      @if ($staff_details->first()->status == 0 && ($user->roles->first()->id == 1 || $user->roles->first()->id == 2))
                         <a href="{{url('/approve-staff/'.$staff_details->first()->staff_id)}}"><button style="background:green !important; color:white !important;" type="button" class="btn btn-sm btn-flat btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span> Approve</button></a>
                      @endif


                      @if($staff_details->first()->status == 1)
                         <a href="{{url('/enable-staff/'.$staff_details->first()->staff_id)}}"><button style="" type="button" class="btn btn-sm btn-flat btn-success"><span class="btn-label"><i class="fa fa-close"></i></span> Deactivate</button></a>
                      @endif
                       
                 </div> <br/>    
                 <div class="box-body">
                          
                           
                  <!-- /.box-header -->
                 <div class="box-body">
                 
                         <table id="tblmarketerinfo" class="table table-bordered"> 
                                 @foreach($staff_details as $staff)
                                                <tbody>
                                                        <tr class="even pointer">
                                                            <th scope="row" bgcolor="#F5F7FA">Staff ID </th>
                                                        <td class="pull-xs-left col-sm-9 col-xs-8">{{$staff->staff_id}}</td>
                                                        </tr>
                                                    </tbody>
                                                     <tbody>
                                                         <tr class="even pointer">
                                                             <th scope="row" bgcolor="#F5F7FA">Name:</th>
                                                             <td class="pull-xs-left col-sm-9 col-xs-8">{{$staff->first_name." ".$staff->other_name." ".$staff->last_name}} </td>
                                                         </tr>
                                                     </tbody>
                 
                                                      <tbody>
                                                         <tr class="even pointer">
                                                             <th scope="row" bgcolor="#F5F7FA">Email </th>
                                                         <td class="pull-xs-left col-sm-9 col-xs-8">{{$staff->email}}</td>
                                                         </tr>
                                                     </tbody>
                 
                                                    <tbody>
                                                         <tr class="even pointer">
                                                             <th scope="row" bgcolor="#F5F7FA">Department </th>
                                                         <td class="pull-xs-left col-sm-9 col-xs-8">{{$staff->department_name}}</td>
                                                         </tr>
                                                     </tbody>
                 
                                                       <tbody>
                                                         <tr class="even pointer">
                                                             <th scope="row" bgcolor="#F5F7FA">Gender </th>
                                                         <td class="pull-xs-left col-sm-9 col-xs-8">{{$staff->gender}}</td>
                                                         </tr>
                                                     </tbody> 
                 
                                                     <tbody>
                                                         <tr class="even pointer">
                                                             <th scope="row" bgcolor="#F5F7FA">Date Of Birth </th>
                                                         <td class="pull-xs-left col-sm-9 col-xs-8">{{$staff->dob}}</td>
                                                         </tr>
                                                     </tbody>

                                                     <tbody>
                                                            <tr class="even pointer">
                                                                <th scope="row" bgcolor="#F5F7FA">Marital Status </th>
                                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$staff->marital_status}}</td>
                                                            </tr>
                                                        </tbody>
                 
                                                        <tbody>
                                                     <tr class="even pointer">
                                                         <th scope="row" bgcolor="#F5F7FA">Phone </th>
                                                         <td class="pull-xs-left col-sm-9 col-xs-8">
                                                          {{$staff->mobile_phone}}           
                                                         </td>
                                                     </tr>
                                                 </tbody>
                 
                                                     <tbody>
                                                         <tr class="even pointer">
                                                             <th scope="row" bgcolor="#F5F7FA">Staff Type</th>
                                                             <td class="pull-xs-left col-sm-9 col-xs-8">{{$staff->staff_type_name}}</td>
                                                         </tr>
                                                     </tbody>
                 
                                                   <tbody>
                                                     <tr class="even pointer">
                                                         <th scope="row" bgcolor="#F5F7FA">Section </th>
                                                         <td class="pull-xs-left col-sm-9 col-xs-8">
                                                          {{$staff->section_name}}
                                                         </td>
                                                     </tr>
                                                 </tbody>
                 
                                                 <tbody>
                                                     <tr class="even pointer">
                                                         <th scope="row" bgcolor="#F5F7FA">Job Category </th>
                                                         <td class="pull-xs-left col-sm-9 col-xs-8">
                                                             {{$staff->category_name}}             
                                                         </td>
                                                     </tr>
                                                 </tbody>

                                                 <tbody>
                                                        <tr class="even pointer">
                                                            <th scope="row" bgcolor="#F5F7FA">Position </th>
                                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                               {{$staff->designation_name}}              
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                    <tbody>
                                                            <tr class="even pointer">
                                                                <th scope="row" bgcolor="#F5F7FA">Position Salary</th>
                                                                <td class="pull-xs-left col-sm-9 col-xs-8">
                                                                        &#8358; {{number_format($salary,2)}}          
                                                                </td>
                                                            </tr>
                                                        </tbody>


                 
                                                 
                 
                                                  <tbody>
                                                     <tr class="even pointer">
                                                         <th scope="row" bgcolor="#F5F7FA">Additional Pay</th>
                                                         <td class="pull-xs-left col-sm-9 col-xs-8">
                                                                &#8358; {{number_format($additional_pay,2)}}        
                                                         </td>
                                                     </tr>
                                                 </tbody>
                 
                 
                                                   
                 
                                                   
                 
                                                 <tbody>
                                                     <tr class="even pointer">
                                                         <th scope="row" bgcolor="#F5F7FA">State Of Residence</th>
                                                         <td class="pull-xs-left col-sm-9 col-xs-8">
                                                              {{$staff->State}}            
                                                         </td>
                                                     </tr>
                                                 </tbody>

                                                 <tbody>
                                                        <tr class="even pointer">
                                                            <th scope="row" bgcolor="#F5F7FA">Local GOVT.</th>
                                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                                 {{$staff->lga}}            
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                    <tbody>
                                                            <tr class="even pointer">
                                                                <th scope="row" bgcolor="#F5F7FA">Address</th>
                                                                <td class="pull-xs-left col-sm-9 col-xs-8">
                                                                     {{$staff->address}}            
                                                                </td>
                                                            </tr>
                                                        </tbody>


                                                        <tbody>
                                                                <tr class="even pointer">
                                                                    <th scope="row" bgcolor="#F5F7FA">Bank</th>
                                                                    <td class="pull-xs-left col-sm-9 col-xs-8">
                                                                          {{$staff->bank}}           
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                            <tbody>
                                                                    <tr class="even pointer">
                                                                        <th scope="row" bgcolor="#F5F7FA">Account Number</th>
                                                                        <td class="pull-xs-left col-sm-9 col-xs-8">
                                                                              {{$staff->account_number}}           
                                                                        </td>
                                                                    </tr>
                                                                </tbody>

                                                                <tbody>
                                                                        <tr class="even pointer">
                                                                            <th scope="row" bgcolor="#F5F7FA">Account Name</th>
                                                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                                                                    {{$staff->account_name}}         
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>

                                                                    <tbody>
                                                                            <tr class="even pointer">
                                                                                <th scope="row" bgcolor="#F5F7FA">BVN</th>
                                                                                <td class="pull-xs-left col-sm-9 col-xs-8">
                                                                                       {{$staff->bvn}}          
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tbody>
                                                                                <tr class="even pointer">
                                                                                    <th scope="row" bgcolor="#F5F7FA">Engagement Date</th>
                                                                                    <td class="pull-xs-left col-sm-9 col-xs-8">
                                                                                           {{$staff->engagement_date}}          
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                 
                                                 @endforeach
                 
                 
                                                    
                                               
                                                    
                 </table>
                  </div></div></div></div>
                 
                 
                 </div>
            <!-- /Row -->
                    </div>
                </div>
            </div>
   

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
                            url:'{{url('/user-list')}}',
                            type: 'GET',
                            "data": function ( d,l ) {
                            d.start_date   = $('#start_date').val();
                            d.end_date   = $('#end_date').val();
                            //d.start_date   = "2019-09-02 00:00";
                            //d.end_date   = "2019-09-02 23:59";
 
                            }

                        },
                        columns: [

                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var checkbox = '<div class="checkbox"><input onClick="ff()" value="'+ data.id +'" type="checkbox"><label for="checkbox1"></label></div>';
                                    return checkbox;
                                }
                            },           
                            {data: 'id', name: 'id'},
                            {data: null,
                            render: function(data){
                                return data.name + " " + data.othername + " " + data.lastname;
                                // return data.name==null?"": data.name + " " + data.othername ==null?"":data.othername + " " + data.lastname ==null?"":data.lastname;
                              }
                            },
                            {data: 'email', name: 'email', orderable: false, searchable: false},
                            {data: 'dob', name: 'dob', orderable: false, searchable: false},
                            {data: 'mobile_phone', name: 'mobile_phone', orderable: false, searchable: false},
                            {data: 'created_at', name: 'created_at', orderable: false,searchable: false},
                            {data: null, orderable: false,searchable: false,
                            render: function(data){
                                    var edit_button = '<a id="' + data.id + '" href="javascript:void(0);" class="text-primary"><icon class="fa fa-info"> View</icon> </a>';
                                    var delete_button = '<a id="' + data.id + '" onclick="take_action_blk(\''+data.id+'\')" href="javascript:void(0)" class="text-danger"><icon class="fa fa-trash"></icon> </a>';
                                    return edit_button + " | " + delete_button;
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
                        url: SITEURL + "/user-list/delete/"+app_ids,
                        success: function (data) {
                            $('#datable_1').DataTable().ajax.reload();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });

                }

                

        @if (Session::get('success'))
            swal({ 
                            title: "Successful",   
                            icon: "success", 
                            text: "{{Session::get('success')}}",
                            confirmButtonColor: "#469408",   
                        }).then((value) => {

                            

             });
        @endif

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