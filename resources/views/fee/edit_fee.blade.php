@foreach($fee_collection as $fee)
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header" style="margin: 0 !important;">
					Edit Fee
				</h6>
				<div class="element-content">
					<div class="row">
						<div class="element-wrapper">
							<div class="element-box">
								<form id="formValidate"  action="{{route('save_edit_fee')}}" method="post"  >
									<input type="hidden" name="fee_id" value="{{$fee->fee_id}}">
									@csrf
									<fieldset class="form-group">

										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for="session_id">Fee Session</label>
													<select autocomplete="off" class="form-control" id="session_id"  name="session_id">
														<option value="">--Select Fee Session--</option>
														@if(isset($session_collection) && $session_collection->isNotEmpty())
															@foreach($session_collection as $val)
																<option
																		@if($fee->session_id==$val->session_id)
																		selected
																		@endif
																		value="{{$val->session_id}}">{{$val->session_name}}</option>
															@endforeach
														@endif
													</select>
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for="fee_type">Fee Type</label>
													<select autocomplete="off" class="form-control" id="fee_type"  name="fee_type">
														<option value="">--Select Fee Type--</option>
														<option {{$fee->fee_type==1?"selected":""}} value="1">General Fee (Applies to all programmes)</option>
														<option {{$fee->fee_type==2?"selected":""}} value="2">Specific</option>
													</select>
												</div>
											</div>
										</div>



										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for="program_type_id">Programme Type</label>
													<select autocomplete="off" class="form-control" id="program_type_id"  name="program_type_id">
														<option value="">--Select Program Type--</option>
														@if(!$programme_type_collection->isEmpty())
															@foreach($programme_type_collection as $val)
																<option
																		@if($fee->program_type_id==$val->program_type_id)
																				{{"selected"}}
																		@endif
																		value="{{ $val->program_type_id }}">{{ $val->program_type_name }}</option>
															@endforeach
														@endif
													</select>
												</div>
											</div>
										</div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="semester">Fee Classification</label>
                                                    <select autocomplete="off" class="form-control" id="fee_class"  name="fee_class">
                                                        <option value="">--Select Fee Classification --</option>
                                                        <option {{$fee->fee_class==1?"selected":""}} value="1">New Students</option>
                                                        <option {{$fee->fee_class==2?"selected":""}} value="2">Returning Students</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

										<div class="row university" @if(!isset($fee->university_id)) style="display:none" @endif>
											<div class="col-sm-6">
												<div class="form-group">
													<label for="university_id">Host University</label>
													<select autocomplete="off" class="form-control" id="university_id"  name="university_id">
														<option value="">--Select Host University-</option>
														@if(!$university_collection->isEmpty())
															@foreach($university_collection as $val)
																<option
																		@if($val->university_id==$fee->university_id)
																				selected
																		@endif

																		value="{{ $val->university_id }}">{{ $val->university }}</option>
															@endforeach
														@endif
													</select>
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for="degree_class">Degree Classification</label>
													<select autocomplete="off" class="form-control" id="degree_class"  name="degree_class">
														<option value="">--Select Degree Classification--</option>
														<option {{$fee->degree_class==1?"selected":""}} value="1">Undergraduate</option>
														<option {{$fee->degree_class==2?"selected":""}} value="2">Post Graduate</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for="programme_id">Select Programme</label>
													<select autocomplete="off" class="form-control" id="programme_id"  name="programme_id">
														<option value="" @if(!$fee->name){{"selected"}}@endif>--Select Program Type--</option>
														@if($fee->name)
														<option value="{{$fee->programme_id}}" selected>{{$fee->degree_short_name." , ".$fee->name}}</option>
														@endif
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="fee_name">
														Fee Name
													</label>
													<input value="{{$fee->fee_name}}" autocomplete="off" class="form-control underline" id="fee_name" placeholder="Enter Fee Name" type="text" name="fee_name">
													<span class="text-danger error-message here"></span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="fee_amount">
														Fee Amount
													</label>
													<input value="{{$fee->fee_amount}}" autocomplete="off" class="form-control underline" id="fee_amount" placeholder="Enter Fee Amount" type="text" name="fee_amount">
													<span class="text-danger error-message here"></span>
												</div>
											</div>
										</div>

									</fieldset>
										<div class="form-buttons-w">
											<button style="cursor: pointer" class="btn btn-lg btn-danger edit_fee" type="submit"> Save Changes</button>
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
