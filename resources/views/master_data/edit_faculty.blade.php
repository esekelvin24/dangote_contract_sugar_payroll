@foreach($faculty_collection as $faculty)
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header">
					Edit Faculty
				</h6>
				<div class="element-content">
					<div class="row">
						<div class="element-wrapper">
							<div class="element-box">
								<form id="formValidate"  >
									<input type="hidden" name="faculty_id" value="{{$faculty->faculty_id}}">
									@csrf
									<fieldset class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for=""> Faculty Name</label><input value="{{$faculty->faculty_name}}" autocomplete="off" name="faculty_name" class="form-control" data-error="Please enter Vehicle Type" required="required" type="text">
													<div class="help-block form-text with-errors form-control-feedback"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for="dean">Faculty Dean (Optional)</label>
													<select autocomplete="off" class="form-control" id="dean"  name="dean">
														<option value="">--Select Dean of New Faculty--</option>
														@if(!$dean_collection->isEmpty())
															@foreach($dean_collection as $val)
																<option
																		@if($val->id==$faculty->dean)
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
											<button style="cursor: pointer" class="btn btn-lg btn-danger edit_faculty" type="submit"> Save Changes</button>
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
