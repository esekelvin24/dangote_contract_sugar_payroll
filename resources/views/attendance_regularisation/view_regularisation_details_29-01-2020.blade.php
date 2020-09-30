@extends('layouts.datatable-adminlte2-4-0')
@section('title') View regularisation Details @endsection
@section('content')


    <section class="content-header">
      <h1>
      <font color="green"><strong>{{ \Carbon\Carbon::parse($regularisation_month->date_to_regulate)->format('F Y') }}</strong></font> Regularisation Details For <font color="green"><strong>{{$get_user_details->name}} ({{$get_user_details->sap}})</strong></font>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active">Regularisation Details</li>
      </ol>
</section>

<section class="content"> 
<div class="row">
   <div class="col-md-12">
    <br>

 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">Regularisation Details</h3>
   
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">
  <form id="form-regularization">

        <table id="tblmarketerinfo" class="table table-bordered"> 
                                 
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Name:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$get_user_details->name}}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Department:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                               @if($regularisation_month->department_id !='')
                                              {{$regularisation_month->department_func->name}}
                                              @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                  <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">SAP NO:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$get_user_details->sap}}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Location:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              @if($regularisation_month->location_id !='')
                                              {{$regularisation_month->perment_office_location_func->perment_office_location_name}}
                                              @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                     <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Month/Period:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              {{ \Carbon\Carbon::parse($regularisation_month->date_to_regulate)->format('F Y') }}
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Reg ID:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$regularisation_month->full_uniq_reg_id}}</td>
                                        </tr>
                                    </tbody>

                                    <!--  <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Date:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">

                                               @foreach ($regularisation_lists as $a => $regularisation_list)    
                                                {{ Carbon\Carbon::parse($regularisation_list->date_to_regulate)->format('d-m-Y') }},&nbsp;&nbsp;
                                                @endforeach

                                            </td>
                                        </tr>
                                    </tbody>  --->
                                  <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Total Number of days:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$total_no_of_days}}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                      <tr class="even pointer">
                                          <th scope="row" bgcolor="#F5F7FA">Attachment:</th>
                                          <td class="pull-xs-left col-sm-9 col-xs-8">

                                        @if( $regularisation_month->attached_doc!="")
                                        <a href="{{ url('/uploads/reg_attached_doc/'.$regularisation_month->attached_doc) }}" download="{{$regularisation_month->attached_doc}}"><i class="fa fa-download" style="color: orange;"></i> </a> 

                                        <a href="{{ url('/uploads/reg_attached_doc/'.$regularisation_month->attached_doc) }}" target="_blank"> &nbsp;&nbsp;{{$regularisation_month->attached_doc}}</a>
                                        @endif
                                        
                                          </td>
                                      </tr>
                                  </tbody>

                                  <tbody>
                                    <tr class="even pointer">
                                        <th scope="row" bgcolor="#F5F7FA">To Be Approved by (HOD):</th>
                                        <td class="pull-xs-left col-sm-9 col-xs-8"> 
                                    @if($regularisation_month->hod_approver_id !="")
                                    {{$regularisation_month->user_hod_approver->name}}
                                    @endif</td>
                                    </tr>
                                </tbody>
    


                                       <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Reason:</th>
                                            <!--<td class="pull-xs-left col-sm-9 col-xs-8">{{$regularisation_month->reason}}-->
                                              
                                             <td>
                                               
                                             </td>
                                        </tr>
                                        <tr class="even pointer">
                                          <td colspan="2">
                                            <table class="table table-bordered">
                                               
                                                <tr>
                                                    @permission(('can-approve-regularisation-hod') || ('can-approve-regularisation-hr')) 
                                                    <td><input type="checkbox" name="allcb" id="allcb"></td>
                                                    @endpermission

                                                    <td>Date</td> <td>Day</td><td>HOD</td> <td>HR</td> <td>Reason</td>  <td>HOD Comment @permission(('can-approve-regularisation-hod')) <strong>(Optional)</strong>  @endpermission </td> <td> HR Comments @permission('can-approve-regularisation-hr') <strong>(Optional)</strong> @endpermission </td>
                                                </tr>
                                               
                                              @foreach ($regularisation_lists as $a => $regularisation_list) 
                                              <tr> 
                                                  @permission(('can-approve-regularisation-hod') || ('can-approve-regularisation-hr'))
                                                  <td> <input type="checkbox" class="ids" name="date_to_regulate" value="{{$regularisation_list->date_to_regulate}}"></td>  
                                                  @endpermission
                                                  <td> {{ Carbon\Carbon::parse($regularisation_list->date_to_regulate)->format('d-m-Y') }} </td>
                                                  <td>{{ \Carbon\Carbon::parse($regularisation_list->date_to_regulate)->format('l') }}</td>
                                                  <td>
                                                    @if($regularisation_list->hod_approver_status == 1)
                                                    <font style="color:green"> Approved</font>
                                                    @elseif ($regularisation_list->hod_approver_status == 2)
                                                    <font style="color:red">Rejected</font>
                                                    @else
                                                       <font style="color:blue">Pending</font>
                                                    @endif
                                                  
                                                  </td>

                                                  <td>
                                                      @if($regularisation_list->hr_status == 1)
                                                      <font style="color:green"> Approved</font>
                                                      @elseif ($regularisation_list->hr_status == 2)
                                                      <font style="color:red">Rejected</font>
                                                      @else
                                                         <font style="color:blue">Pending</font>
                                                      @endif
                                                    
                                                    </td>

                                                  <td> {{$regularisation_list->reason}} </td>
                                                  
                                                 <!-- <td> {{$regularisation_list->hod_comments}} NNB</td>  -->

                                                    
                                                    @if($regularisation_list->user_id == Auth::user()->id)
                                                        <td> {{$regularisation_list->hod_comments}} </td> 
                                                    @else
                                                        @permission(('can-approve-regularisation-hod')) 
                                                              <td>  <textarea style="width:100%" rows="2" id="hod_comments" name = "{{ Carbon\Carbon::parse($regularisation_list->date_to_regulate)->format('Y-m-d') }}">{{$regularisation_list->hod_comments}} </textarea></td>
                                                        @endpermission

                                                        @permission(('can-approve-regularisation-hr')) <td> {{$regularisation_list->hod_comments}}</td> @endpermission
                                                    @endif
                                                    
                                                    



                                                    @if ($regularisation_list->user_id == Auth::user()->id)
                                                         <td> {{$regularisation_list->hr_comments}} </td> 
                                                    @else
                                                        @permission(('can-approve-regularisation-hr')) 
                                                              <td>  <textarea style="width:100%" rows="2" id="hr_comments" name = "{{ Carbon\Carbon::parse($regularisation_list->date_to_regulate)->format('Y-m-d') }}"> {{$regularisation_list->hr_comments}}</textarea></td>
                                                        @endpermission

                                                        @permission(('can-approve-regularisation-hod')) <td> {{$regularisation_list->hr_comments}}</td> @endpermission
                                                    @endif

                                                    
                                                   
                                                   
                                                </tr>
                                              @endforeach
                                            </table>
                                            
                                            </td>
                                        </tr>
                                    </tbody>

                                     

    
                               
                            <tbody>
                              <tr class="even pointer">
                                  <th scope="row" bgcolor="#F5F7FA">HOD Approval:</th>
                                  <td class="pull-xs-left col-sm-9 col-xs-8">

                               <div class="row" > 
                                  


                                <div id="display_hod_approval_status" class="col-sm-8">

                                @if(isset($hod_approval_proc->hod_approver_id))
                                This was proccessed by (<strong>{{$hod_approval_proc->user_hod_approver_id_actual->name}}</strong>)
                                @endif

                                
                                <img src="{{asset('asset-adminlte-v-2-4-0/dist/img/loader_gif.gif')}}"  id="img" style="display:none;" / >
                                </div>

                               

                 @permission(('can-approve-regularisation-hod')) 
                         
                                  <div class="btn-group" data-toggle="buttons" class="col-sm-4">  
                                  
                                  <button style="margin-right:15px;" class="btn btn-success" type="button" name="pen_is_retired" id="option1"      onclick="call_hod_approval_status_fun('1');" ><i class="fa fa-check"></i>Approve</button>
                                  
                                  
                                  <button class="btn btn-danger" type="button" name="pen_is_retired" id="option2"    onclick="call_hod_approval_status_fun('2');"><i class="fa fa-times"></i>Reject</button>
                                  </label>
                                  </div>
                           
                 @endpermission
                                  </div>  
                              </td>
                              </tr>
                            </tbody>

                        <tbody>
                              <tr class="even pointer">
                                  <th scope="row" bgcolor="#F5F7FA">HR Approval:</th>
                                  <td class="pull-xs-left col-sm-9 col-xs-8">

                               <div class="row" > 
                                   

                                <div id="display_hr_approval_status" class="col-sm-8">

                                  @if(isset($hr_approval_proc->hr_approver_id) )
                                 This was proccessed by (<strong>{{$hr_approval_proc->user_hr_approver->name}}</strong>) 
                                  @endif

                               
                                <img src="{{asset('asset-adminlte-v-2-4-0/dist/img/loader_gif.gif')}}"  id="img2" style="display:none;" / >
                                </div>

                             
               @permission(('can-approve-regularisation-hr')) 
                          @if(isset($hod_approval_proc->user_hod_approver_id_actual->name))
                                  <div class="btn-group" data-toggle="buttons" class="col-sm-4">  
                                  
                                  <button style="margin-right:15px;" class="btn btn-success" type="button" name="pen_is_retired" id="option1"    onclick="call_hr_approval_status_fun('1');" ><i class="fa fa-check"></i>Approve</button>
                                  
                                 
                                  <button class="btn btn-danger" type="button" name="pen_is_retired" id="option2"   onclick="call_hr_approval_status_fun('2');"><i class="fa fa-times"></i>Reject</button>
                                  
                                  </div>
                           @endif  
                 @endpermission
                                  </div>  
                              </td>
                              </tr>
                            </tbody>         

   

                              
</table>
  </form>
 </div></div></div></div></div>

 <input type="hidden" name="user_id" value="{{$get_user_details->id}}" id="user_id">
 <input type="hidden" name="regularisation_grp_no" value="{{$regularisation_month->regularisation_grp_no}}" id="regularisation_grp_no">
 

</div></section>


<script type="text/javascript">

$('#allcb').change(function(){

    if($(this).prop('checked')){
        var cnt = 0;
        $('tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', true);
            cnt++;
        });
        //$("#button-group").show();
        //$("#button-group").text('Take action on '+cnt+' record(s) ' );
    }else{
        $('tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', false);
        });
        //$("#button-group").hide();
        //$("#button-group").text("");
    }
}); 

function call_hod_approval_status_fun(val)
{
  
$('#img').show();
  // alert('hello alert');
  var  user_id = document.getElementById("user_id").value;
  var  regularisation_grp_no = document.getElementById("regularisation_grp_no").value;

  var selectedDate = new Array();
  $('input[name="date_to_regulate"]:checked').each(function() {
    selectedDate.push(this.value);
  });


  var data =$("#form-regularization").serializeArray();
            

   

  //console.log(hod_comments);

  
if (selectedDate.length < 1)
{
  swal("Error", "Kindly use the checkbox to select a date", "error");
  $('#img').hide();  //<--- hide again
}
else{

    // alert(regularisation_grp_no);
    $.ajax({
    type: 'get',
    url: '{{url('/ajax_get_hod_approval_status')}}',
    data: {
    get_option:val,
    user_id:user_id,
    regularisation_grp_no:regularisation_grp_no,
    selected_dates: selectedDate,
    data: data
    },

    success: function (response) {
      $("#display_hod_approval_status").html(response);
      $('#img').hide();  //<--- hide again
      location.reload(true);
    }
    });
}


}

</script>

<script type="text/javascript">

function call_hr_approval_status_fun(val)
{



$('#img2').show();
  // alert('hello alert');
  var  user_id = document.getElementById("user_id").value;
  var  regularisation_grp_no = document.getElementById("regularisation_grp_no").value;

  var selectedDate = new Array();
  $('input[name="date_to_regulate"]:checked').each(function() {
    selectedDate.push(this.value);
  });


  var data =$("#form-regularization").serializeArray();
  

  if (selectedDate.length < 1)
{
    swal("Error", "Kindly use the checkbox to select a date", "error");
    $('#img2').hide();  //<--- hide again
}
else{

      // alert(val);
    $.ajax({
    type: 'get',
    url: '{{url('/ajax_get_hr_approval_status')}}',
    data: {
    get_option:val,
    user_id:user_id,
    regularisation_grp_no:regularisation_grp_no,
    selected_dates: selectedDate,
    data: data
    
    },

    success: function (response) {
      $("#display_hr_approval_status").html(response);
      $('#img2').hide();  //<--- hide again
      location.reload(true);
    }
    });

}


}

</script>


@endsection