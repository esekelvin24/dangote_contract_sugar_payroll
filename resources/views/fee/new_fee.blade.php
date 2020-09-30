@extends('../layouts.dash_layout')

@section('required_css')
@endsection

@section('content')
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
		            <form id="form" action="{{route('save_fee')}}" method="post"  role="form">
			       @csrf
			       <div>

					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="session_id">Fee Session</label>
								   <select autocomplete="off" class="form-control" id="session_id"  name="session_id">
									   <option value="">--Select Fee Session--</option>
									   @if(isset($session_collection) && $session_collection->isNotEmpty())
										    @foreach($session_collection as $val)
									   		<option
													@if($val->session_status==1)
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
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="fee_type">Fee Type</label>
								   <select autocomplete="off" class="form-control" id="fee_type"  name="fee_type">
									   <option value="" selected>--Select Fee Type--</option>
									   <option value="1">General Fee (Applies to all programmes)</option>
									   <option value="2">Specific</option>
								   </select>
							   </div>
						   </div>
					   </div>

					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="semester">Fee Classification</label>
								   <select autocomplete="off" class="form-control" id="fee_class"  name="fee_class">
									   <option value="" selected>--Select Fee Classification --</option>
									   <option value="1">New Students</option>
									   <option value="2">Returning Students</option>
								   </select>
							   </div>
						   </div>
					   </div>

					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="program_type_id">Programme Type</label>
								   <select autocomplete="off" class="form-control" id="program_type_id"  name="program_type_id">
									   <option value="" selected>--Select Program Type--</option>
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

					   <div class="row degree_class">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="degree_class">Degree Classification</label>
								   <select autocomplete="off" class="form-control" id="degree_class"  name="degree_class">
									   <option value="">--Select Degree Classification--</option>
									   <option value="1">Undergraduate</option>
									   <option value="2">Post Graduate</option>
								   </select>
							   </div>
						   </div>
					   </div>

					   <div class="row programme_id">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="programme_id">Select Programme</label>
								   <select autocomplete="off" class="form-control" id="programme_id"  name="programme_id">
									   <option value="" selected>--Select Program Type--</option>
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
								   <input value="{{old('fee_name')}}" autocomplete="off" class="form-control underline" id="fee_name" placeholder="Enter Fee Name" type="text" name="fee_name">
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
								   <input value="{{old('fee_amount')}}" autocomplete="off" class="form-control underline" id="fee_amount" placeholder="Enter Fee Amount" type="text" name="fee_amount">
								   <span class="text-danger error-message here"></span>
							   </div>
						   </div>
					   </div>


				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary btn-block btn-scroll btn-scroll-left ti-book create" type="submit"><span>CREATE FEE</span></button>
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
	<script src="{{asset("bower_components/simple.money.format.js")}}"></script>
    <script>
		$('#fee_amount').simpleMoneyFormat();

		$('form#form').on('change','select#fee_type',(function(e)
		{
			var type_id=$.trim($(this).val());
			if(type_id==1) {
				$("select#programme_id").val("").prop('disabled', 'disabled');
				$("div.programme_id").slideUp();
				$("div.degree_class").slideDown();
				$("select#degree_class").prop('disabled', false);
			}
			else if(type_id==2) {
				$("select#programme_id").val("").prop('disabled', false);
				$("select#degree_class").prop('disabled', 'disabled');
				$("div.programme_id").slideDown();
				$("div.degree_class").slideUp();
			}
		}));

		$('form#form').on('change','select#program_type_id',(function(e)
		{
			var id=$.trim($(this).val());
			if(id!="" && $("select#fee_type").val()==2){
				$.ajax(
						{
							type:"POST",
							data:{id,
								_token:$("input[name='_token']").val()
							},
							url:"{{route('get_programmes_for_types')}}",
							beforeSend:function()
							{
								$('body').block({ message: "fetching programmes..." });
							},
							success: function(r)
							{
								$('select#programme_id').unblock();
								if(r!="")
								{
									$('body').unblock();
									$('select#programme_id').html(r);
								}

							}
						}
				);
			}else if(id==1 && $("select#fee_type").val()==1){
				$("div.university").slideDown();
			}else if(id==2 && $("select#fee_type").val()==1){
				$("div.university").slideUp();
			}

		}));

		$('form#form').on('click','button.create',(function(e)
		{
			e.preventDefault();
			var fee_type=$.trim($("select#fee_type").val());
			var programme_type=$.trim($("select#program_type_id").val());
			var fee_name=$.trim($("input#fee_name").val());
			var fee_amount=$.trim($("input#fee_amount").val());
			var university_id=$.trim($("select#university_id").val());

			if(!fee_type)
				swal("error!", "Fee type is compulsory", "error");
			else if(!programme_type)
				swal("error!", "Programme type is compulsory", "error");
			else if(!fee_name)
				swal("error!", "Fee name is compulsory", "error");
			else if(!fee_amount)
				swal("error!", "Fee Amount is compulsory", "error");
			else if(fee_type==1 && programme_type==1 && !university_id )
				swal("error!", "You must specify Host University", "error");
			else
				$('form#form').submit();

		}));

	
	</script>
@endsection
