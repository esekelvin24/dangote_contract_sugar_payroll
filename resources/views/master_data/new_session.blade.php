@extends('../layouts.dash_layout')

@section('required_css')
@endsection

@section('content')
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
		            <form id="form" action="{{route('save_session')}}" method="post"  role="form">
			       @csrf
			       <div>

	                   <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="session_name">
										Session Name <span class="symbol required font" style="font-size: 12px; color:orangered"> (Note that creating a new session automatically activates it as the current session)</span>
									</label>
									<input value="{{old('session_name')}}" autocomplete="off" class="form-control underline" required id="session_name" placeholder="Enter Session Name e.g 2015/2016" type="text" name="session_name">
									<span class="text-danger error-message here"></span>
								</div>
							</div>
						</div>

				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary btn-block btn-scroll btn-scroll-left ti-book create" type="submit"><span>CREATE NEW SESSION</span></button>
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
			var session_name=$.trim($("input#session_name").val());
			if(session_name)
				$('form#form').submit();
			else
				swal("error!", "All fields are compulsory", "error");
		}));

	
	</script>
@endsection
