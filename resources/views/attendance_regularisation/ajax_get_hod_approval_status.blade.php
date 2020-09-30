@if($allow_to_approve_hod == 'YES')

@if ($regularisation_list->hod_approver_status == 0)
<i class="fa fa-spinner" style="color: orange;"> Pending </i>
@elseif ($regularisation_list->hod_approver_status == 1) 
<i class="fa fa-check" style="color: green;"> Approved </i>
@elseif ($regularisation_list->hod_approver_status == 2) 
<i class="fa fa-times" style="color: red;"> Rejected </i>
@endif

@else
<i class="fa fa-times" style="color: orange;"> NOT ALLOWED </i>
@endif
<img src="{{asset('asset-adminlte-v-2-4-0/dist/img/loader_gif.gif')}}" id="img" style="display:none"/ >