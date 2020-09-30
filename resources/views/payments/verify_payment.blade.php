@extends('../layouts.dash_layout')

@section('required_css')

@endsection


@section('content')
	<div class="content-box">
		@csrf
		<div class="element-wrapper">
			<h6 class="element-header">
				Verify Payments
			</h6>
			<div class="element-box">
				<div class="form-group">
					<label for=""> Enter Reference</label><input autocomplete="off" class="form-control ref" placeholder="Enter payment reference" type="text">
				</div>

				<div class="form-buttons-w">
					<button class="btn btn-primary verify" type="submit">Verify Payment</button>
				</div>
				<div class="here"></div>

			</div>
		</div>
	</div>


@endsection

@section('required_js')
@endsection

@section('additional_js')
	<script>
	$('body').on('click','button.verify',function(e)
	{
		e.preventDefault();
		var ref=$("input.ref").val();
		var toks=$("input[name='_token']").val();
		var da_link="{{route('verify_payments_process')}}";
		var animation_image_path="{{asset("_img/payment.gif")}}";
		$.ajax(
				{
					type:"POST",
					url:`${da_link}`,
					data:{ref,_token:toks},
					beforeSend:function()
					{
						$('div.here').html("");
						$('body').block({ message: `<img src='${animation_image_path}' >` });
					},
					success: function(r)
					{
						$('body').unblock();
						$('div.here').html(r);
					}
				}

		);
	});


	</script>
@endsection
