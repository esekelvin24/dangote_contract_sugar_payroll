@foreach($degree_collection as $degree)
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header" style="margin: 0 !important;">
					Edit Degree Type
				</h6>
				<div class="element-content">
					<div class="row">
						<div class="element-wrapper">
							<div class="element-box">
								<form id="formValidate"  action="{{route('save_edit_degree_type')}}" method="post"  >
									<input type="hidden" name="degree_type_id" value="{{$degree->degree_type_id}}">
									@csrf
									<fieldset class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for=""> Degree Name</label><input value="{{$degree->degree_name}}" autocomplete="off" name="degree_name" class="form-control" data-error="Please enter Degree Name" required="required" type="text">
													<div class="help-block form-text with-errors form-control-feedback"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for=""> Degree Short Name</label><input value="{{$degree->degree_short_name}}" autocomplete="off" name="degree_short_name" class="form-control" data-error="Please enter Degree Short Name" required="required" type="text">
													<div class="help-block form-text with-errors form-control-feedback"></div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="faculty_id">Degree Class</label>
											<select autocomplete="off" class="form-control" id="degree_class"  name="degree_class">
												<option @if($degree->degree_class==1){{"selected"}}@endif value="1">Undergraduate</option>
												<option @if($degree->degree_class==2){{"selected"}}@endif value="2">Post Graduate</option>
											</select>
										</div>
									</fieldset>
										<div class="form-buttons-w">
											<button style="cursor: pointer" class="btn btn-lg btn-danger edit_degree" type="submit"> Save Changes</button>
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
