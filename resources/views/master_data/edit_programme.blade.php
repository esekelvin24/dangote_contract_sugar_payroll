@foreach($programme_collection as $programme)
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header" style="margin: 0 !important;">
					Edit Programme
				</h6>
				<div class="element-content">
					<div class="row">
						<div class="element-wrapper">
							<div class="element-box">
								<form id="formValidate"  action="{{route('save_edit_programme')}}" method="post"  >
									<input type="hidden" name="programme_id" value="{{$programme->programme_id}}">
									@csrf
									<fieldset class="form-group">

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label for="status">Programme Status</label>
													<select autocomplete="off" class="form-control" id="status"  name="status">
													<option @if($programme->status==1){{"selected"}}@endif value="1">{{"Active"}}</option>
													<option @if($programme->status==2){{"selected"}}@endif value="2">{{"Suspended"}}</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for=""> Programme Name</label><input value="{{$programme->name}}" autocomplete="off" name="name" class="form-control" data-error="Please enter Programme Name" required="required" type="text">
													<div class="help-block form-text with-errors form-control-feedback"></div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label for="programme_type_id">Programme Type</label>
													<select autocomplete="off" class="form-control" id="programme_type_id"  name="programme_type_id">
														@if(!$programme_type_collection->isEmpty())
															@foreach($programme_type_collection as $val)
																<option @if($programme->programme_type_id==$val->program_type_id){{"selected"}}@endif
																		value="{{ $val->program_type_id }}">{{ $val->program_type_name }}</option>
															@endforeach
														@endif
													</select>
												</div>
											</div>
										</div>

										<div class="row university" style="display:@if(isset($programme->university_id)) {{"inherit"}} @else {{"none"}} @endif">
											<div class="col-sm-6">
												<div class="form-group">
													<label for="university_id">Host University</label>
													<select autocomplete="off" class="form-control" id="university_id"  name="university_id">
														<option value="">--Select Host University-</option>
														@if(!$university_collection->isEmpty())
															@foreach($university_collection as $val)
																<option
																		@if($val->university_id==$programme->university_id)
																				{{"selected"}}
																		@endif
																		value="{{ $val->university_id }}">{{ $val->university }}</option>
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
														@if(!$degree_type_collection->isEmpty())
															@foreach($degree_type_collection as $val)
																<option
																		@if($programme->degree_type_id==$val->degree_type_id){{"selected"}}@endif
																		value="{{ $val->degree_type_id }}">{{ $val->degree_name }}</option>
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
														@if(!$faculty_collection->isEmpty())
															@foreach($faculty_collection as $val)
																<option
																		@if($programme->faculty_id==$val->faculty_id){{"selected"}}@endif
																		value="{{ $val->faculty_id }}">{{ $val->faculty_name }}</option>
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
														@if(!$department_collection->isEmpty())
															@foreach($department_collection as $val)
																<option
																		@if($programme->department_id==$val->department_id){{"selected"}}@endif
																		value="{{ $val->department_id }}">{{ $val->department_name }}</option>
															@endforeach
														@endif
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
													<input value="{{$programme->duration}}" autocomplete="off" class="form-control underline" required id="duration" placeholder="Enter Duration e.g 4" type="text" name="duration">
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
													<input value="{{$programme->min_first_sem}}" autocomplete="off" class="form-control underline" required id="min_first_sem" placeholder="Min. 1st Semester Unit" type="text" name="min_first_sem">
													<span class="text-danger error-message here"></span>
												</div>
											</div>
											<div class="col-md-3 col-sm-3">
												<div class="form-group">
													<label for="min_second_sem">
														2nd Semester Min. Unit
													</label>
													<input value="{{$programme->min_second_sem}}" autocomplete="off" class="form-control underline" required id="min_second_sem" placeholder="Min. 2nd Semester Unit" type="text" name="min_second_sem">
													<span class="text-danger error-message here"></span>
												</div>
											</div>
											<div class="col-md-3 col-sm-3">
												<div class="form-group">
													<label for="max_session_unit">
														Max. Session Unit
													</label>
													<input value="{{$programme->max_session_unit}}" autocomplete="off" class="form-control underline" required id="max_session_unit" placeholder="Maximum Session Unit" type="text" name="max_session_unit">
													<span class="text-danger error-message here"></span>
												</div>
											</div>
											<div class="col-md-3 col-sm-3">
												<div class="form-group">
													<label for="max_prog_unit">
														Max. Programme Unit
													</label>
													<input value="{{$programme->max_prog_unit}}" autocomplete="off" class="form-control underline" required id="max_prog_unit" placeholder="Maximum Programme Unit" type="text" name="max_prog_unit">
													<span class="text-danger error-message here"></span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group" style="padding-left: 20px">
													<label for="accepts_direct_entry" class="form-check-label">
														<input
																@if($programme->accepts_direct_entry)
																		{{"checked"}}
																@endif
																id="accepts_direct_entry" name="accepts_direct_entry" class="form-check-input" type="checkbox">Accepts Direct Entry
													</label>
												</div>
											</div>
										</div>
										<div class="element-box">
											<h5 class="form-header">
												Programme Description
											</h5>
											<textarea cols="80" id="ckeditor1" name="description" rows="10">{{$programme->description}}</textarea>
										</div>

										<div class="element-box">
											<h5 class="form-header">
												Normal Entry Admission Requirements
											</h5>
											<textarea cols="80" id="normal_entry_requirement" name="normal_entry_requirement" rows="10">{{$programme->normal_entry_requirement}}</textarea>
										</div>

										<div class="element-box direct_entry_requirement" style="display: @if(!$programme->accepts_direct_entry){{"none"}} @endif">
											<h5 class="form-header">
												Direct Entry Admission Requirements
											</h5>
											<textarea cols="80" id="direct_entry_requirement" name="direct_entry_requirement" rows="10">{{$programme->direct_entry_requirement}}</textarea>
										</div>


									</fieldset>
										<div class="form-buttons-w">
											<button style="cursor: pointer" class="btn btn-lg btn-danger edit_programme" type="submit"> Save Changes</button>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
