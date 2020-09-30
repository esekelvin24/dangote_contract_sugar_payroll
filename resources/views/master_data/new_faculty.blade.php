@extends('../layouts.dash_layout')

@section('required_css')
@endsection


@section('content')
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
		            <form id="form"  action="{{route("save_faculty")}}" method="post"  role="form">
			       @csrf
			       <div>
	                   <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="faculty">
										Faculty <span class="symbol required font"></span>
									</label>
									<input value="" autocomplete="off" class="form-control underline each" id="faculty" placeholder="Enter Faculty Name" type="text" name="faculty">
									<span class="text-danger error-message here"></span>
								</div>
							</div>
						</div>

					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="dean">Faculty Dean (Optional)</label>
								   <select autocomplete="off" class="form-control" id="dean"  name="dean">
									   <option value="" selected>--Select Dean of New Faculty--</option>
									   @if(!$dean_collection->isEmpty())
										   @foreach($dean_collection as $val)
											   <option value="{{ $val->id }}">{{ $val->firstname." ".$val->middlename." ".$val->lastname }}</option>
										   @endforeach
									   @endif
								   </select>
							   </div>
						   </div>
					   </div>


				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary btn-block btn-scroll btn-scroll-left ti-book create" type="submit"><span>CREATE FACULTY</span></button>
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

	</script>
@endsection
