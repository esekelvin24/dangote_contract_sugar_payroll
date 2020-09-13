@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container-fluid">

        <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Print Weekly Time Sheet</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/user-list">User List</a></li>
                    <li class="active"><span>Print Weekly Time Sheet</span></li>
                </ol>
                </div>
                <!-- /Breadcrumb -->
                
        </div>


        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                         

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form target="_blank" method="POST" action="{{url('/time-sheet/print')}}">

                                                @csrf
                                                <div class="form-body">
                                                    
                                                    
                                                    <div class="row">
                                                            <div class="col-md-2">
                                                                    <div class="form-group @error('new_date') has-error @enderror">
                                                                            <span class="txt-danger" style="font-size:19px;">*</span>     <label class="control-label mb-10">Start Date</label>
                                                                        <input autocomplete="off" type="text" id="start_range" name="start_range" class="form-control"  placeholder="Select the start date" required >
                                                                        @error('new_date')
                                                                            <span class="help-block" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                              <!--  <div class="col-md-2">
                                                                        <div class="form-group @error('new_date') has-error @enderror">
                                                                            <label class="control-label mb-10">End Date</label>
                                                                            <input type="text" id="end_range" name="end_range" class="form-control"  placeholder="Select the end range" required autofocus>
                                                                            @error('new_date')
                                                                                <span class="help-block" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>  -->

                                                                    <!--/span-->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group mb-0">
                                                                                <span class="txt-danger" style="font-size:19px;">*</span>   <label class="control-label mb-10 text-left">Department</label>
                                                                            
                                                                            <select onchange="get_section(this.value)" required id="department_id" name="department_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                                
                                                                            <option value="">Choose a Department</option>
                                                                             @if(count($dept_array_list) > 0)
                                                                               @foreach ($dept_array_list as $dept)
                                                                               {{$dept_id = isset($dept_id)?$dept_id:""}}
                                                                            <option {{ $dept->department_id == $dept_id ?"selected":"" }} value="{{$dept->department_id}}">{{$dept->department_name}}</option>
                                                                               
                                                                                @endforeach
                                                                             @endif
                                                                                
                                                                             
                                                                            </select>

                                                                            @error('new_date')
                                                                            <span class="help-block" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </div>
                                                                      </div>

                                                                    <div class="col-lg-2">
                                                                        <div class="form-group mb-0">
                                                                            <label class="control-label mb-10 text-left">Section</label>
                                                                            <select  id="section_id" name="section_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                            
                                                                            </select>

                                                                            @error('section_id')
                                                                            <span class="help-block" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </div>
                                                                     </div>
                                                       
                                                                    <div class="col-lg-2">
                                                                            <div class="form-group mb-0">
                                                                                    <span class="txt-danger" style="font-size:19px;">*</span>    <label class="control-label mb-10 text-left">Staff Type</label>
                                                                                <select id="staff_type" name="staff_type" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                                @if(count($staff_type) > 0)
                                                                                   @foreach($staff_type as $type)
                                                                                        <option value="{{$type->staff_type_id}}">{{$type->staff_type_name}}</option>
                                                                                  @endforeach
                                                                                @endif
                                                                            </select>
                                                                            @error('staff_type')
                                                                            <span class="help-block" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                            </div>
                                                                     </div>
        
                                                                      

                                                                      
                                                       
                                                    </div>

                                                   
                                                    

                                                        
                                                    <div class="row">

                                                         

                                                            
                                                        <!-- /Row -->
                                                    </div>

                                                    <div class="row">
                                                        <!--/span-->
                                                       

                                                    </div>

                                                 
                                                    <hr class="light-grey-hr">    
                                                    
                                                        
                                                    <div align="center" class="form-actions mt-10">
                                                        <button type="submit" class="btn btn-info">
                                                                {{ __('Print') }}
                                                            </button>
                                                       
                                                    </div>
                                                
                                    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>		
                </div>
            </div>
           
<script>
    var SITEURL = '{{URL::to('')}}';
$( document ).ready(function() {

 /*var myCalendar;
	    myCalendar = new dhtmlXCalendarObject(["start_range", "end_range"]);
       // myCalendar.showWeekNumbers();
        myCalendar.setWeekStartDay(7);
        myCalendar.hideWeekNumbers
*/

  $('#start_range').datepicker({
      format: 'yyyy-mm-dd',
          // endDate: '+0d',
           
       });


       

            });

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
</script>



@endsection 