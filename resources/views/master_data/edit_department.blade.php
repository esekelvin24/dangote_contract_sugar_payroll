@foreach($department_collection as $department)
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header" style="margin: 0 !important;">
					Edit Department
				</h6>
				<div class="element-content">
					<div class="row">
						<div class="element-wrapper">
							<div class="element-box">
								<form id="formValidate"  action="{{route('save_edit_department')}}" method="post"  >
									<input type="hidden" name="department_id" value="{{$department->department_id}}">
									@csrf
									<fieldset class="form-group">
                                        <div class="form-group">
                                            <label for="faculty_id">Faculty</label>
                                            <select autocomplete="off" class="form-control" id="faculty_id"  name="faculty_id">
                                                @if(!$faculty_collection->isEmpty())
                                                    @foreach($faculty_collection as $val)
                                                        <option
                                                                @if($department->faculty_id==$val->faculty_id){{"selected"}}@endif
                                                                value="{{ $val->faculty_id }}">{{ $val->faculty_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for=""> Department Name</label><input value="{{$department->department_name}}" autocomplete="off" name="department_name" class="form-control" data-error="Please enter Degree Type" required="required" type="text">
													<div class="help-block form-text with-errors form-control-feedback"></div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for="hod">Head of Department (Optional)</label>
													<select autocomplete="off" class="form-control" id="hod"  name="hod">
														<option value="">--Select HOD--</option>
														@if(!$hod_collection->isEmpty())
															@foreach($hod_collection as $val)
																<option
																		@if($val->id==$department->hod)
																		{{"selected"}}
																		@endif
																		value="{{ $val->id }}">{{ $val->firstname." ".$val->middlename." ".$val->lastname }}</option>
															@endforeach
														@endif
													</select>
												</div>
											</div>
										</div>

									</fieldset>
										<div class="form-buttons-w">
											<button style="cursor: pointer" class="btn btn-lg btn-danger edit_department" type="submit"> Save Changes</button>
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
