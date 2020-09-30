@extends('../layouts.dash_layout')

@section('required_css')
@endsection

@section('content')
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
		            <form id="form" action="{{route('save_programme')}}" method="post"  role="form">
			       @csrf
			       <div>

	                   <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">
										Programme Name
									</label>
									<input value="{{old('name')}}" autocomplete="off" class="form-control underline" required id="name" placeholder="Enter Name of Programme" type="text" name="name">
									<span class="text-danger error-message here"></span>
								</div>
							</div>
						</div>

					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="programme_type_id">Programme Type</label>
								   <select autocomplete="off" class="form-control" id="programme_type_id"  name="programme_type_id">
									   <option value="" selected>--Select Programme Type--</option>
									   @if(!$programme_type_collection->isEmpty())
										   @foreach($programme_type_collection as $val)
											   <option value="{{ $val->program_type_id }}">{{ $val->program_type_name }}</option>
										   @endforeach
									   @endif
								   </select>
							   </div>
						   </div>
					   </div>

					   <div class="row university" style="display:none">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="university_id">Host University</label>
								   <select autocomplete="off" class="form-control" id="university_id"  name="university_id">
									   <option value="" selected>--Select Host University-</option>
									   @if(!$university_collection->isEmpty())
										   @foreach($university_collection as $val)
											   <option value="{{ $val->university_id }}">{{ $val->university }}</option>
										   @endforeach
									   @endif
								   </select>
							   </div>
						   </div>
					   </div>

					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="degree_type_id">Degree Type</label>
								   <select autocomplete="off" class="form-control" id="degree_type_id"  name="degree_type_id">
									   <option value="" selected>--Select Degree Type--</option>
									   @if(!$degree_type_collection->isEmpty())
										   @foreach($degree_type_collection as $val)
											   <option value="{{ $val->degree_type_id }}">{{ $val->degree_name }}</option>
										   @endforeach
									   @endif
								   </select>
							   </div>
						   </div>
					   </div>

					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="faculty_id">Faculty</label>
								   <select autocomplete="off" class="form-control" id="faculty_id"  name="faculty_id">
									   <option value="" selected>--Select Faculty--</option>
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
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="department_id">Department</label>
								   <select autocomplete="off" class="form-control" id="department_id"  name="department_id">
									   <option value="" selected>--Select Department--</option>
								   </select>
							   </div>
						   </div>
					   </div>

					   <div class="row">
						   <div class="col-md-6">
							   <div class="form-group">
								   <label for="duration">
									   Programme Duration
								   </label>
								   <input value="{{old('duration')}}" autocomplete="off" class="form-control underline" required id="duration" placeholder="Enter Duration e.g 4" type="text" name="duration">
								   <span class="text-danger error-message here"></span>
							   </div>
						   </div>
					   </div>

                       <div class="row">
                           <div class="col-md-3 col-sm-3">
                               <div class="form-group">
                                   <label for="min_first_sem">
                                       1st Semester Min. Unit
                                   </label>
                                   <input value="{{old('min_first_sem')}}" autocomplete="off" class="form-control underline" required id="min_first_sem" placeholder="Min. 1st Semester Unit" type="text" name="min_first_sem">
                                   <span class="text-danger error-message here"></span>
                               </div>
                           </div>
                           <div class="col-md-3 col-sm-3">
                               <div class="form-group">
                                   <label for="min_second_sem">
                                       2nd Semester Min. Unit
                                   </label>
                                   <input value="{{old('min_second_sem')}}" autocomplete="off" class="form-control underline" required id="min_second_sem" placeholder="Min. 2nd Semester Unit" type="text" name="min_second_sem">
                                   <span class="text-danger error-message here"></span>
                               </div>
                           </div>
                           <div class="col-md-3 col-sm-3">
                               <div class="form-group">
                                   <label for="max_session_unit">
                                       Max. Session Unit
                                   </label>
                                   <input value="{{old('max_session_unit')}}" autocomplete="off" class="form-control underline" required id="max_session_unit" placeholder="Maximum Session Unit" type="text" name="max_session_unit">
                                   <span class="text-danger error-message here"></span>
                               </div>
                           </div>
                           <div class="col-md-3 col-sm-3">
                               <div class="form-group">
                                   <label for="max_prog_unit">
                                       Max. Programme Unit
                                   </label>
                                   <input value="{{old('max_prog_unit')}}" autocomplete="off" class="form-control underline" required id="max_prog_unit" placeholder="Maximum Programme Unit" type="text" name="max_prog_unit">
                                   <span class="text-danger error-message here"></span>
                               </div>
                           </div>
                       </div>

					   <div class="row accepts_direct_entry">
						   <div class="col-md-6">
							   <div class="form-group" style="padding-left: 20px">
								   <label for="accepts_direct_entry" class="form-check-label">
									   <input id="accepts_direct_entry" name="accepts_direct_entry" autocomplete="off" class="form-check-input" type="checkbox">Accepts Direct Entry
								   </label>
							   </div>
						   </div>
					   </div>

					   <div class="element-box">
						   <h5 class="form-header">
							   Programme Description
						   </h5>
						   <textarea cols="80" id="ckeditor1" name="description" rows="10">{{old('description')}}</textarea>
					   </div>

					   <div class="element-box">
						   <h5 class="form-header">
							  Normal Entry Admission Requirements
						   </h5>
						   <textarea cols="80" id="normal_entry_requirement" name="normal_entry_requirement" rows="10">{{old('normal_entry_requirement')}}</textarea>
					   </div>

					   <div class="element-box direct_entry_requirement" style="display: none">
						   <h5 class="form-header">
							   Direct Entry Admission Requirements
						   </h5>
						   <textarea cols="80" id="direct_entry_requirement" name="direct_entry_requirement" rows="10">{{old('direct_entry_requirement')}}</textarea>
					   </div>

				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary btn-block btn-scroll btn-scroll-left ti-book create" type="submit"><span>CREATE PROGRAMME</span></button>
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
		$("body").on('change','input#accepts_direct_entry',function(){
			if($(this).is(":checked")) {
				$("div.direct_entry_requirement").slideDown();
			}
			else {
				$("div.direct_entry_requirement").slideUp();
			}
		});
		CKEDITOR.replace('normal_entry_requirement');
		CKEDITOR.replace('direct_entry_requirement');
		$('form#form').on('change','select#faculty_id',(function(e)
		{
			var fac_id=$.trim($(this).val());
			if(fac_id!=""){
				$.ajax(
						{
							type:"POST",
							data:{id:fac_id,
								_token:$("input[name='_token']").val()
							},
							url:"{{route('get_departments')}}",
							beforeSend:function()
							{
								$('select#department_id').block({ message: "fetching departments" });
							},
							success: function(r)
							{
								$('select#department_id').unblock();
								if(r!="")
								{
									$('select#department_id').html(r);
								}

							}
						}
				);
			}

		}));
		$('form#form').on('change','select#programme_type_id',(function(e)
		{
			var programme_type_id_id=$.trim($(this).val());
			if(programme_type_id_id==1){
				$("div.university").slideDown();
				$("select#university_id").removeAttr("disabled");
			}else if(programme_type_id_id==2){
				$("select#university_id").attr("disabled","disabled");
				$("select#university_id").val("");
				$("div.university").slideUp();
			}

		}));

		$('form#form').on('click','button.create',(function(e)
		{
			e.preventDefault();
			var name=$.trim($("input#name").val());
			var programme_type=$.trim($("select#programme_type_id").val());
			var degree_type=$.trim($("select#degree_type_id").val());
			var faculty=$.trim($("select#faculty_id").val());
			var department=$.trim($("select#department_id").val());
			var duration=$.trim($("input#duration").val());
			var description=$.trim(CKEDITOR.instances.ckeditor1.getData());
			if(name && programme_type && degree_type && faculty && department && duration && description)
				$('form#form').submit();
			else
				swal("error!", "All fields are compulsory", "error");
		}));

	
	</script>
@endsection
