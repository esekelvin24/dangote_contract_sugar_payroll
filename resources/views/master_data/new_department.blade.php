@extends('../layouts.dash_layout')

@section('required_css')
@endsection

@section('content')
    <div class="content-box">
		@if(Session::get('dept_success'))
		<div class="alert alert-success" style="margin-top:3px; margin-bottom:0">
			Department created successfully!
		</div>
		@endif
        <div class="row">
            <div class="col-sm-12">
		            <form id="form" action="{{route('save_department')}}" method="post"  role="form">
			       @csrf
			       <div>
					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="faculty_id">Faculty</label>
								   <select autocomplete="off" class="form-control" id="faculty_id"  name="faculty_id">
									   <option value="" selected>--Please Select Faculty--</option>
									   @if(!$faculty_collection->isEmpty())
										   @foreach($faculty_collection as $val)
											   <option value="{{ $val->faculty_id }}">{{ $val->faculty_name }}</option>
										   @endforeach
									   @endif
								   </select>
							   </div>
						   </div>
					   </div>
	                   <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="department">
										Department <span class="symbol required font"></span>
									</label>
									<input value="{{old('department_name')}}" autocomplete="off" class="form-control underline" required id="department" placeholder="Enter Department Name" type="text" name="department_name">
									<span class="text-danger error-message here"></span>
								</div>
							</div>
						</div>

					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="hod">Head of Department (Optional)</label>
								   <select autocomplete="off" class="form-control" id="hod"  name="hod">
									   <option value="" selected>--Select HOD--</option>
									   @if(!$hod_collection->isEmpty())
										   @foreach($hod_collection as $val)
											   <option value="{{ $val->id }}">{{ $val->firstname." ".$val->middlename." ".$val->lastname }}</option>
										   @endforeach
									   @endif
								   </select>
							   </div>
						   </div>
					   </div>

				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary btn-block btn-scroll btn-scroll-left ti-book create" type="submit"><span>CREATE DEPARTMENT</span></button>
					</div>
			   </div>

                <span class="clearfix"></span>

               </div>
                  </form>
            </div>
        </div>
    </div>
@endsection

@section('additional_js')
    <script>

		$('form#form').on('click','button.create',(function(e)
		{
			e.preventDefault();
			var faculty=$.trim($("select#faculty_id").val());
			var department=$.trim($("input#department").val());
			if(faculty && department)
				$('form#form').submit();
			else
				swal("error!", "A department must belong to a Faculty and Cannot be Empty", "error");
		}));

	
	</script>
@endsection
