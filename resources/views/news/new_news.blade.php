@extends('../layouts.dash_layout')

@section('required_css')
@endsection

@section('content')
    <div class="content-box">
		@if(Session::get('news_success'))
		<div class="alert alert-success" style="margin-top:3px; margin-bottom:0">
			News created successfully!
		</div>
		<br/>
		@endif
        <div class="row">
            <div class="col-sm-12">
		            <form enctype="multipart/form-data" id="form" action="{{route('save_news')}}" method="post"  role="form">
			       @csrf
			       <div>
					   
	                   <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="department">
										Title <span class="symbol required font"></span>
									</label>
									<input value="{{old('news_title')}}" autocomplete="off" class="form-control underline" required id="news_title" placeholder="Enter News Title" type="text" name="news_title">
									<span class="text-danger error-message here"></span>
								</div>
							</div>
						</div>

						<div  class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="department">
										Banner Image <span class="symbol required font"></span>
									</label>
									<br/><img style="display:none" height="120" width="120" id="blah" src="#" alt="your image" /><br/>
									<input value="{{old('banner_image')}}" autocomplete="off" class="form-control underline" required id="banner_image" placeholder="Enter News Title" type="file" name="banner_image">
									<span class="text-danger error-message here"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									
									<div class="element-box">
										<h5 class="form-header">
										 News Content
										</h5>
										<textarea cols="80" id="ckeditor1" name="ckeditor1" rows="10" required></textarea>
									   </div>
									<span class="text-danger error-message here"></span>
								</div>
							</div>
						</div>

						<div class="form-check">
							<label class="form-check-label"><input  onchange="show_attachment()" name="att_chkbox" id="att_chkbox" class="form-check-input" type="checkbox">Add Attachment</label>
						</div>

						<div id="attachment_div" style="display:none" class="row">
							<div class="col-md-6">
								<div class="form-group">
									
									<input value="{{old('attachment_file')}}" autocomplete="off" class="form-control underline"  id="attachment_file" placeholder="Enter News Title" type="file" name="attachment_file">
									<span class="text-danger error-message here"></span>
								</div>
							</div>
						</div>
                        <br/>


				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary btn-block btn-scroll btn-scroll-left ti-book create" type="submit"><span>CREATE NEWS</span></button>
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

		function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function(e) {
			$('#blah').attr('src', e.target.result);
			$('#blah').show();
			}
			
			reader.readAsDataURL(input.files[0]);
		}
		}

		$("#banner_image").change(function() {
		  readURL(this);
		});

		function show_attachment()
		{
			
			if(document.getElementById('att_chkbox').checked) {
				$("#attachment_div").show();
				$('#attachment_file').prop('required',true);
				$("#att_chkbox").val(1);
			} else {
				$("#att_chkbox").val(0);
				$("#attachment_div").hide();
				$('#attachment_file').prop('required',false);
			}
		}

		

	
	</script>
@endsection
