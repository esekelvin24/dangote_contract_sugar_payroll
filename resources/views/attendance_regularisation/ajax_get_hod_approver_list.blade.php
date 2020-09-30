<select name = 'hod_approver_id' id = 'hod_approver_id' class = 'form-control' required>
<option value="">Select an HOD</option>
@foreach($get_hod_for_the_user  as $value) 
@if (Request::old('hod_approver_id') == $value->sap)
<option value="{{ $value->sap }}" selected>{{$value->first_name." ".$value->name}}</option>
@else
<option value="{{$value->sap}}">{{$value->first_name." ".$value->name}}</option>
@endif
@endforeach 
</select>