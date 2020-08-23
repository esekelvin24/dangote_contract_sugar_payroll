@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')


<div class="container-fluid">

    <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Change Password</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li class="active"><span>Change Password</span></li>
            </ol>
            </div>
            <!-- /Breadcrumb -->
    </div>



    <div class="panel-wrapper collapse in">
            <div class="">
                <div class="table-wrap">
                  

    		<!-- Row -->
            
                    <div class="col-md-6">
                     <br>
                 
                  <div class="box box-info">
                     
                 <div style="padding-left:10px; padding-right:10px; padding-bottom:10px; " class="box-body">
                          
                           
                 
                              <!-- Horizontal Form -->
                              
                                <div class="box-header with-border">
                                  <h4 class="box-title">Change Password for <strong>{{$name}}</strong></h4>
                                 </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                
                      
                        <form method="POST" action="{{url("/save_reset_credentials/".$user_id)}}">
                    
                            @csrf
                            @php
                                 $role_arr = Auth::user()->roles;
                                  $role = $role_arr->pluck('id');
                                  $role = rtrim($role,"]");
                                  $role = ltrim($role,"[");
                            @endphp
                    @if(($role=="2" && Auth::user()->id !=$user_id) || ($role=="1" && Auth::user()->id != $user_id))
                        
                    @else
                        <div class="form-group">
                                <label for="current-password">Current Password</label>
                                <input id="current-password" name="current-password" type="password" class="form-control" required="">
                        </div>
                    
                    @endif
                       <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control" required="">
                        </div>
                    
                            <div class="form-group">
                                <label for="password_confirmation">Retype Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required="">
                                          </div>
                    
                    
                    
                            <button class="btn btn-primary" type="submit">Submit</button>
                             </form>
                        </div>
                    
                       
                    
                  </div></div></div>
                 
                 
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

                


        
        </script>

<script>
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


<script>
        @if (Session::get('success'))
            swal({ 
                            title: "Successful",   
                            icon: "success", 
                            text: "{{Session::get('success')}}",
                            confirmButtonColor: "#469408",   
                        }).then((value) => {

                            

             });
        @endif
    </script>

@endsection 