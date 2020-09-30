@extends('../layouts.dash_layout')

@section('required_css')
@endsection

@section('content')
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
		            <form id="form" action="{{route('save_degree_type')}}" method="post"  role="form">
			       @csrf
			       <div>

					   <div class="row">
						   <div class="col-sm-6">
							   <div class="form-group">
								   <label for="degree_class">Degree Classification</label>
								   <select autocomplete="off" class="form-control" id="degree_class"  name="degree_class">
									   <option value="" selected>--Select Degree Classification--</option>
									   <option value="1">Undergraduate</option>
									   <option value="2">Post Graduate</option>
								   </select>
							   </div>
						   </div>
					   </div>

	                   <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="degree_name">
										Degree Type <span class="symbol required font"></span>
									</label>
									<input value="{{old('degree_name')}}" autocomplete="off" class="form-control underline" required id="degree_name" placeholder="Enter Degree Type Name" type="text" name="degree_name">
									<span class="text-danger error-message here"></span>
								</div>
							</div>
						</div>

					   <div class="row">
						   <div class="col-md-6">
							   <div class="form-group">
								   <label for="degree_short_name">
									   Degree Short Name <span class="symbol required font"></span>
								   </label>
								   <input value="{{old('degree_short_name')}}" autocomplete="off" class="form-control underline" required id="degree_short_name" placeholder="Enter Degree Short Name e.g BSc." type="text" name="degree_short_name">
								   <span class="text-danger error-message here"></span>
							   </div>
						   </div>
					   </div>

				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary btn-block btn-scroll btn-scroll-left ti-book create" type="submit"><span>CREATE DEGREE TYPE</span></button>
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
			var degree_class=$.trim($("select#degree_class").val());
			var degree_name=$.trim($("input#degree_name").val());
			var degree_short_name=$.trim($("input#degree_short_name").val());
			if(degree_class && degree_name && degree_short_name)
				$('form#form').submit();
			else
				swal("error!", "All fields are compulsory", "error");
		}));

	
	</script>
@endsection
