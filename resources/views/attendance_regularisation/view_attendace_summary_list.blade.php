@extends('layouts.datatable-adminlte2-4-0')
@section('title') Attendance Summary List @endsection
@section('content')
@php
    $a= 0;
@endphp
    <section class="content-header">
      <h1>
        ATTENDANCE SUMMARY FOR (
        @if($user_category == "1")
        NATIONAL STAFF
        @elseif($user_category == "2")
        EXPAT STAFF
        @elseif($user_category == "3")
        CASUAL STAFF
        @elseif($user_category == "4")
        CONTRACT STAFF
        @elseif($user_category == "")
        ALL STAFF
        @else
        ALL STAFF
        @endif
        )
   
    </h1>
        
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Attendance Summary List</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section style="margin-top:20px" class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


            <div class="box-header">
            <!--   @permission(('can-register-users')) 
                        <a href="{{ url('/register_user') }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-user-plus"></i></span> Register New User</button></a>
                    @endpermission  -->
            <form method = 'GET' action = "{{url('/view_attendance_summary')}}">
            @csrf
            <input type = 'hidden' name = 'category' value = "{{$user_category}}">
             @permission(('can-view-all-users')) 
                    <a href="{{ url('/view_attendance_summary?category=1&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> National Staff</button></a>

                    <a href="{{ url('/view_attendance_summary?category=2&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Expat Staff</button></a>

                    <a href="{{ url('/view_attendance_summary?category=3&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Casual Workers</button></a>

                    <a href="{{ url('/view_attendance_summary?category=4&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Contract Staff</button></a> 

                    <a href="{{ url('/view_attendance_summary?category=all&dept=select') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> All Staff</button></a> 
            @endpermission 
                          
                         <br/><br/>
                    
                    <div class="row">
                        <div class="col-md-2">
                           
                                <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}"">
                                        <label>Month Of</label>

                                <input value="{{$request->month}}" class="date-own form-control" type="text" style="width:100%;" name="month" id="month" value="" placeholder="Select a month" > 
                                </div>
                        </div>

                        <div class="col-md-3">
                          
                          <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}"">
                            <label>Department</label>
                            <select {{isset($request->hbp_id)?"":""}}  name = 'd' id = 'd' class = 'form-control' >
                            <option value="30221222211">Select a Department</option>
                            
                            @foreach($department as $key => $value) 
                                @if (Request::old('user_id') == $key)
                            <option {{$request->d == $key?" selected ": ""}} value="{{ $key }}" >{{$value}}</option>
                                @else
                                    <option {{$request->d == $key?" selected ": ""}} value="{{$key}}">{{$value}}</option>
                                @endif
                            @endforeach 
                            </select>
                          </div>
                        </div>
                        

                        <div class="col-md-1">
                                        <button style="margin-top:25px" type="submit" class="btn btn-primary block">Filter</button>
                        </div>
                    </div>
                    @if(isset($request->month))
                       <h3>Month of {{date('F, Y', strtotime($request->month))}}</h3>  
                    @endif        
        
</div>



          
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <br/>
             <table id="example1" class="table table-borderless table-striped">
                <thead>
                    <tr style="background-color: #a0bdf2">
                              <th class="exportable">S/No</th>
                              <th class="exportable">SAP</th>
                              <th class="exportable">Name</th>
                              <th class="exportable">Department</th>
                              
                              @for($i=0; $i < count($date_list);$i++)
                                  <th class="exportable"> {{number_format($date_no[$i])}} {{substr($day[$i],0,1)}}</th>
                              @endfor
                              <th class="exportable">Present</th>
                              <th class="exportable">Absent</th>
                              <th>Action</th>
                      </tr>
                </thead>
                <tbody>
                
                      
                   @foreach ($users as  $user) 
                   @php
                       $ab = 0;
                       $ps = 0;
                   @endphp 
                      <tr>
                        <td>{{$a = $a + 1}}</td>
                        <td>{{$user->sap}}</a></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->department_name}}</td>
                        @for($i=0; $i < count($date_list);$i++)



                              

                          @if((array_key_exists($user->sap, $cockin_daily_record))) <!---- IF Staff has Clockin history for this month --->
                              
                            @if((array_key_exists(  date('Ymd', strtotime($date_list[$i]))  , $cockin_daily_record[ $user->sap  ]))) <!---- IF Staff Clocked In for this date --->
 
                                  @if(substr( $cockin_daily_record[$user->sap][ date('Ymd', strtotime($date_list[$i])) ]  ,0,1)=="P")
                                         <td>P </td>
                                         @php $ps = $ps + 1 @endphp
                                  @else
                                  
                                          @if (!(\Carbon\Carbon::parse(date('Ymd', strtotime($date_list[$i])))->isSunday()))
                                               
                                                @if ((array_key_exists($user->sap, $regularisation))) <!-- Check if staff did regularisation for this date  -->
                                                    @if((array_key_exists(  date('Ymd', strtotime($date_list[$i])  )  , $regularisation[ $user->sap  ])))

                                                            @if($regularisation[  $user->sap ][   date('Ymd', strtotime($date_list[$i])) ]=="approved")
                                                                    <td>P1</td>
                                                                    @php $ps = $ps + 1 @endphp
                                                            @else
                                                                      @if (!(\Carbon\Carbon::parse(date('Ymd', strtotime($date_list[$i])))->isSunday()))
                                                                         <!-----     <td style="color:red">A</td> IF the staff did not fill regularisation the staff will be marked absent ----->
                                                                             <td style="color:red"> {{$cockin_daily_record[$user->sap][ date('Ymd', strtotime($date_list[$i])) ]}}</td>
                                                                            
                                                                            @php
                                                                                  $ab = $ab + 1;
                                                                            @endphp
                                                                      @else
                                                                        <td></td>
                                                                      @endif
                                                            @endif     

                                                    @endif

                                                @else  

                                                   <td style="color:red">{{$cockin_daily_record[$user->sap][ date('Ymd', strtotime($date_list[$i])) ]}}</td>

                                                    <!----- <td style="color:red">A</td>  IF is not sunday and the person is absent. mark the person absent because it a week day ----->
                                                    @php
                                                          $ab = $ab + 1;
                                                    @endphp



                                                @endif

                                          
                                               





                                          @else
                                            <td></td>
                                          @endif
                                  @endif

                            @else  <!-- Check if staff did regularisation for the date not clocked in  -->

                                  @if ((array_key_exists($user->sap, $regularisation)))
                                          @if((array_key_exists(  date('Ymd', strtotime($date_list[$i])  )  , $regularisation[ $user->sap  ])))
                                                  
                                                @if($regularisation[  $user->sap ][   date('Ymd', strtotime($date_list[$i])) ]=="approved")
                                                         <td>P1</td>
                                                         @php $ps = $ps + 1 @endphp
                                                @else
                                                      @if (!(\Carbon\Carbon::parse(date('Ymd', strtotime($date_list[$i])))->isSunday()))
                                                            <td style="color:red">A</td>  <!----- IF is not sunday and the person is absent. mark the person absent because it a week day ----->
                                                            @php
                                                                  $ab = $ab + 1;
                                                            @endphp
                                                      @else
                                                        <td></td>
                                                      @endif
                                                @endif
                                                 
                                          @else
                                                    @if (!(\Carbon\Carbon::parse(date('Ymd', strtotime($date_list[$i])))->isSunday()))
                                                        <td style="color:red">A</td>  <!----- IF is not sunday and the person is absent. mark the person absent because it a week day ----->
                                                    @php
                                                              $ab = $ab + 1;
                                                        @endphp
                                                    @else
                                                      <td></td>
                                                    @endif
                                          @endif
                                        
                                    @else
                                            @if (!(\Carbon\Carbon::parse(date('Ymd', strtotime($date_list[$i])))->isSunday()))
                                                <td style="color:red">A</td>  <!----- IF is not sunday and the person is absent. mark the person absent because it a week day ----->
                                                @php
                                                      $ab = $ab + 1;
                                                @endphp
                                            @else
                                              <td></td>
                                            @endif

                                    @endif
                            @endif



                          @else  <!---- Check if the staff did regularisation for this date  --->
                              
                                    @if ((array_key_exists($user->sap, $regularisation)))
                                          @if((array_key_exists(  date('Ymd', strtotime($date_list[$i])  )  , $regularisation[ $user->sap  ])))

                                                  @if($regularisation[  $user->sap ][   date('Ymd', strtotime($date_list[$i])) ]=="approved")
                                                          <td>P1</td>
                                                          @php $ps = $ps + 1 @endphp
                                                  @else
                                                            @if (!(\Carbon\Carbon::parse(date('Ymd', strtotime($date_list[$i])))->isSunday()))
                                                                  <td style="color:red">A</td>  <!----- IF the staff did not fill regularisation the staff will be marked absent ----->
                                                                  @php
                                                                        $ab = $ab + 1;
                                                                  @endphp
                                                            @else
                                                              <td></td>
                                                            @endif
                                                  @endif


                                          @else
                                              @if(!(\Carbon\Carbon::parse(date('Ymd', strtotime($date_list[$i])))->isSunday()))
                                                <td style="color:red">A</td>  <!----- IF the date was is not regularise the staff will be marked absent ----->
                                                @php
                                                  $ab = $ab + 1;
                                                @endphp
                                              @else
                                                <td></td>
                                              @endif
                                          @endif
                                        
                                    @else

                                            @if (!(\Carbon\Carbon::parse(date('Ymd', strtotime($date_list[$i])))->isSunday()))
                                                <td style="color:red">A</td>  <!----- IF is not sunday and the person is absent. mark the person absent because it a week day ----->
                                                @php
                                                      $ab = $ab + 1;
                                                @endphp
                                            @else
                                              <td></td>
                                            @endif

                                    @endif


                          @endif





                          
                        @endfor
                        <td>{{$ps}} </td>
                        <td>{{$ab}} </td>
                        <td>
                            <a href="{{ url('/my_attendance/'.$user->sap) }}"  target="_blank"><button type="button" class="btn btn-warning btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Info</button></a>
                        </td>
                      </tr>
                 @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <script>
 function deleteuser(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Are you sure?",
    text: "You want to delete this User!",   type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!", 
    closeOnConfirm: false 
  }, 
       function(){   
       window.location.href = "{{ url('/delete_user') }}" + '/' + e;

    // $("#myform").submit();
  });
}

</script>
@endsection

{{-- //////datatable script start here////////////////// --}}
@section('datatableissuesfixed')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example1').removeAttr('width').DataTable( {

        scrollCollapse: false,
        paging:         true,
        ordering:       true,
        searching:    true,
        columnDefs: [
            { width: 8, targets: 0 },
            { width: 120, targets: 1 },
            { width: 140, targets: 2 },
            { width: 140, targets: 3 },
            { width: 140, targets: 4 },
            { width: 140, targets: 5 },
            { width: 140, targets: 6 },
            { width: 140, targets: 7 },
            { width: 140, targets: 8 },
        ],
        
        dom: 'Bfrtip',
        buttons: [

      {
         extend: 'excel',
         text: 'Save as Excel',
        exportOptions: {
            columns: ':visible.exportable'
        }
      },
      
]

    
    } );
} );


</script>
<script type="text/javascript">

  $('.date-own').datepicker({

      minViewMode: 1,
   format: 'yyyy-mm-dd'

   });

</script>
@endsection
{{-- //////datatable script ends here////////////////// --}}