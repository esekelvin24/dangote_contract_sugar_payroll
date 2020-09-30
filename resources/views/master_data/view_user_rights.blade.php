@extends('../layouts.dash_layout')

@section('required_css')
@endsection

@section('content')
	<style>
		.new_active{
			background-color: #1f1d5e !important;
		}
		.new_active a{
			color:white !important;
			text-decoration: none;
		}
		input.hidden{
			display:none !important;
		}
		.nav{
			display: block !important;
		}
		.tabs-left > .nav-tabs > li{
			min-width: 200px;
		}
	</style>

	<div class="content-box">
		<div class="element-wrapper">
			<h6 class="element-header">
				All Created Rights (@if( $rights_collection->isEmpty() ) 0 @else{{$rights_collection->count()}}@endif)
			</h6>
			<!--  Begin Initial -->
			<div class="element-box">
				<div id="initial" class="init">

					<form action="" id="form">
						@csrf
							<div class="form-group">
										<label for="rights_id">
											User Rights
										</label>
										<select autocomplete="off" class="form-control" id="rights_id"  name="rights_id">
										<option selected="selected" value="">--Select Rights--</option>
										@foreach($rights_collection as $val)
											<option value="{{ $val->rights_id }}">{{ $val->rights_name}}</option>
										@endforeach
										</select>
									</div>

										<div id="here">

										</div>
					   </form>


				</div>
			</div>
			<!--  End of Initial -->
		</div>



@endsection

@section('required_js')
    <script src="{{asset('bower_components/bootstrap-checkbox/bootstrap-checkbox.js')}}"></script>
@endsection

@section('additional_js')
    <script>


		$('form').on('change','select#rights_id',function(e)
		{
			   var id=$(this).val();
			   var toks=$('input[name="_token"]').val();
			   if(id!="")
			   {
				 $.ajax(
						 {
							 type:"POST",
							 data:{rights_id:id,_token:toks},
														 
							@if(Route::current()->getName() == 'edit_user_rights')
							 
							 url:"{{route('get_edit_user_rights')}}",
							@else
							  url:"{{route('get_view_user_rights')}}",
							@endif
							 
							 beforeSend:function()
							  {
								  $('select#rights_id').block({ message: null });
							  },
							  success: function(r)
							  {							  
								 $('select#rights').unblock();

								 $('div#here').html(r);
							  }
						 }

					 );
			   }else{
				 $('div#here').html("Kindly Select Rights in order to view associated privileges");
			   }

				});

		$("input[type=checkbox]").removeAttr("checked");
		$('body').on('click','.tabs-left > .nav-tabs > li',function(){
			$('.tabs-left > .nav-tabs > li').removeClass('new_active');
			$(this).addClass('new_active');
		});


		@if(Route::current()->getName() == 'edit_user_rights')
		
		$('form#form').on('click','button#submit',function(e)
				{
					e.preventDefault();
					    var name=$.trim($('input[name="rights_name"]').val());
					    var main_menu=$('input[data-main]:checked').length;
					   					
						if(name=="")
							sweetAlert("Oops...", "Kindly enter name for User Rights", "error");
						else if(main_menu==0)
							sweetAlert("Oops...", "You must select at least one main right", "error");
						else
						{				
						
							 $.ajax(
								 {
									 type:"POST",
									 data:$('form#form').serialize(),
									 url:"{{route('save_edit_user_rights')}}",
									 beforeSend:function()
									  {
										  $('form#form').block({ message: null }); 
									  },
									  success: function(r)
									  {							  
										 $('form#form').unblock(); 
							
											 swal("success!", "Operation was successful", "success");
										     location.reload();
									  }
								 }
				 
						     );
							
						}

					
				});
        @endif

			
		
	</script>
@endsection
