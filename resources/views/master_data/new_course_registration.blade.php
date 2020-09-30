@extends('../layouts.dash_layout')

@section('required_css')
@endsection

@section('content')
    <div class="content-box">
		@if(Session::get('course_success'))
		<div class="alert alert-success" style="margin-top:3px; margin-bottom:0">
			{{Session::get('course_success')}}
		</div>
		@endif

		@if(Session::get('course_error'))
		<div class="alert alert-danger" style="margin-top:3px; margin-bottom:0">
			{{Session::get('course_error')}}
		</div>
		@endif

		@if(Auth::user()->user_type==1 && isset($year))

		@if ($already_sub < 1)



		<h3>Computer Science Year {!!$spill_text==""?$year." (".$session_name.") ":$spill_text!!}</h3><br/>       <p style="margin-top:-50px; float:right"><strong>Max Session Unit :</strong> <span class="bagde badge-pill badge-primary" style="padding:3px">{{$max_session_unit}}</span> </p>
        <div  id="print_div" class="row">
            <div class="col-sm-12">
		            <form  id="form" action="{{route('save_course_registration')}}" method="post"  role="form">
			       @csrf
			       <div>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="a1">

                          
							
							<h4>Semester 1 (<font id="sel_sem1_unit">0 Units</font>)</h4>
							<hr><strong>Minimum Semester Unit:</strong><span> {{$min_sem_unit_one}} </span><hr>
							<br/>

							<table class="table">
								<thead class="thead-dark">
								  <tr>
									<th scope="col"></th>
									<th scope="col">Short Code</th>
									<th scope="col">Course Title</th>
									<th scope="col">Unit</th>
									<th scope="col">Category</th>
									
								  </tr>
								</thead>
								<tbody>

								@php
									$sem_one_count = 0;
									//dd($course_registration);
								@endphp
								<input name="spill" value="{{$spill_check.$year}}" type="hidden" />
								@foreach($course_registration as $val)

								 @if($val->course_semester == 1)
								  <tr>
									<td>
										@php
											$sem_one_count = $sem_one_count + 1;
										@endphp

										<div style="margin-top:-15px !important;" class="checkbox clip-check check-success">
										<input onchange="sem_one_unit_sum()" class="sem_one_check" {{$val->course_category==1?"checked":""}} autocomplete="off" data-sub="3" data-unit="{{$val->course_unit}}"  id="c3{{$val->course_short_code}}" name="sem_one[{{$sem_one_count}}][id]" value="{{base64_encode($val->course_id)}}" type="checkbox">
										  <label for="{{"c3".$val->course_short_code }}"></label>
										  <input name="sem_one[{{$sem_one_count}}][code]" value="{{base64_encode($val->course_short_code)}}" type="hidden" />
										  <input name="sem_one[{{$sem_one_count}}][cat]" value="{{base64_encode($val->course_category)}}" type="hidden" />
										  <input name="sem_one[{{$sem_one_count}}][un]" value="{{base64_encode($val->course_unit)}}" type="hidden" />
										  <input name="sem_one[{{$sem_one_count}}][ye]" value="{{base64_encode($val->course_year)}}" type="hidden" />
										  <input name="sem_one[{{$sem_one_count}}][se]" value="{{base64_encode($val->course_semester)}}" type="hidden" />
										  <input name="sem_one[{{$sem_one_count}}][ti]" value="{{base64_encode($val->course_title)}}" type="hidden" />
										  <input name="sem_one[{{$sem_one_count}}][ctyp]" value="{{base64_encode($val->course_type)}}" type="hidden" />
										</div>
									</td>
									<td>{{$val->course_short_code}}</td>
									<td>{{$val->course_title}}</td>
									<td>{{$val->course_unit}}</td>
									<td>{{$val->course_category==1?"Mandatory":"Elective"}}</td>
									
								  </tr>
								  @endif

								  @endforeach
								</tbody>
							  </table>
							  <br/>
							  <h4>Semester 2 (<font id="sel_sem2_unit">0 Units</font>)</h4>
							  <hr><strong>Minimum Semester Unit:</strong><span> {{$min_sem_unit_two}} </span><hr>
							  <br/>
							  <table class="table">
								<thead class="thead-dark">
								  <tr>
									<th scope="col"></th>
									<th scope="col">Short Code</th>
									<th scope="col">Course Title</th>
									<th scope="col">Unit</th>
									<th scope="col">Category</th>
									
								  </tr>
								</thead>
								<tbody>

								@php
									$sem_one_count = 0;
								@endphp
								@foreach($course_registration as $val)
								 @if($val->course_semester ==2)
								  <tr>
									<td>
										@php
											$sem_one_count = $sem_one_count + 1;
										@endphp

										<div style="margin-top:-15px !important;" class="checkbox clip-check check-success">
										<input onchange="sem_two_unit_sum()" class="sem_two_check" {{$val->course_category==1?"checked":""}} autocomplete="off" data-sub="3" data-unit="{{$val->course_unit}}"  id="c2{{$val->course_short_code}}" name="sem_two[{{$sem_one_count}}][id]" value="{{base64_encode($val->course_id)}}" type="checkbox">
										  <label for="{{"c2".$val->course_short_code }}"></label>
										  <input name="sem_two[{{$sem_one_count}}][code]" value="{{base64_encode($val->course_short_code)}}" type="hidden" />
										  <input name="sem_two[{{$sem_one_count}}][cat]" value="{{base64_encode($val->course_category)}}" type="hidden" />
										  <input name="sem_two[{{$sem_one_count}}][un]" value="{{base64_encode($val->course_unit)}}" type="hidden" />
										  <input name="sem_two[{{$sem_one_count}}][ye]" value="{{base64_encode($val->course_year)}}" type="hidden" />
										  <input name="sem_two[{{$sem_one_count}}][se]" value="{{base64_encode($val->course_semester)}}" type="hidden" />
										  <input name="sem_two[{{$sem_one_count}}][ti]" value="{{base64_encode($val->course_title)}}" type="hidden" />
										  <input name="sem_two[{{$sem_one_count}}][ctyp]" value="{{base64_encode($val->course_type)}}" type="hidden" />
										</div>
									</td>
									<td>{{$val->course_short_code}}</td>
									<td>{{$val->course_title}}</td>
									<td>{{$val->course_unit}}</td>
									<td>{{$val->course_category==1?"Mandatory":"Elective"}}</td>
									
								  </tr>
								  @endif
								  @endforeach
								</tbody>
							  </table>
					
	                   
                <br/><br/><br/>
				<div align="center" class="">
					<div  class="col-md-3">
						<button class="btn btn-primary btn-block btn-scroll btn-scroll-left ti-book create" type="submit"><span>REGISTER</span></button>
					</div>
			   </div>
                <span class="clearfix"></span>

               </div>
                  </form>
            </div>
		</div>


		<!-------------------------------------- END OF COURSE REGISTRATION -------------------------------------->
		@else



		<div align="center" class="">
			<div  class="col-md-3">
				<select onchange="registered_session(this.value)" class="form-control" id="designation_id"  name="designation_id">
					<option value="" selected >Select a Session</option>
					@if(!$session_collection->isEmpty())
						@foreach($session_collection as $val)
							<option {{$session_id== $val->session_id?"selected":""}}  value="{{ base64_encode($val->session_id) }}">{{ $val->session_name }}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>

		<style>
			.form-inline{
				display: block !important;
			}
			ul.pagination a {
				position: relative;
				display: block;
				padding: 0.5rem 0.75rem;
				margin-left: -1px;
				line-height: 1.25;
				color: #047bf8;
				background-color: #fff;
				border: 1px solid #dee2e6;
			}
		</style>
<div id="button"></div>
	<br/>
	<h4>Semester 1 </h4>
	<br/>
		<table id="dataTable1" class="table table-striped" style="width: 100% !important;">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Short Code</th>
					<th scope="col">Course Title</th>
					<th scope="col">Unit</th>
					<th scope="col">Category</th>
					<th scope="col">Semester</th>
				</tr>
			</thead>
			
			<tbody>
			@php
				$total_one_unit = 0;
			@endphp
			
			@foreach($registered_course as $val)
			  @if ($val->course_semester == 1)
				<tr>
					<td>{{$val->course_short_code}}</td>
					<td>{{$val->course_title}}</td>
					<td>{{$val->course_unit}}</td>
					<td>{{$val->course_category==1?"Mandatory":"Elective"}}</td>
					<td>1</td>
						@php
							$total_one_unit = $val->course_unit + $total_one_unit;
						@endphp
				</tr>
			@endif
			@endforeach
				<tr>
					<td></td>
					<td align="right"> <strong> Second Semester Units:</strong></td>
					<td> {{$total_one_unit}} </td>
					<td></td>
					<td></td>
				</tr>
				
		</tbody>
	</table>
	<br/>
	<h4>Semester 2 </h4>
	<br/>

		<table id="dataTable1" class="table table-striped" style="width: 100% !important;">
				<thead class="thead-dark">

					
					<tr>
						<th scope="col">Short Code</th>
						<th scope="col">Course Title</th>
						<th scope="col">Unit</th>
						<th scope="col">Category</th>
						<th scope="col">Semester</th>
					</tr>
				</thead>

				@php
					$total_two_unit = 0;
				 @endphp
				 
				<tbody>
			@foreach($registered_course as $val)
			    @if ($val->course_semester == 2)
					<tr>
						
						<td>{{$val->course_short_code}}</td>
						<td>{{$val->course_title}}</td>
						<td>{{$val->course_unit}}</td>
						<td>{{$val->course_category==1?"Mandatory":"Elective"}}</td>
						<td>2</td>
					</tr>
					@php
						$total_two_unit = $val->course_unit + $total_two_unit;
					@endphp
				@endif
			@endforeach
					  <tr>
						  <td></td>
						  <td align="right"> <strong> Second Semester Units:</strong></td>
						  <td> {{$total_two_unit}} </td>
						  <td></td>
						  <td></td>
					  </tr>
				</tbody>
		</table>

		<div style="padding:10px;  border-style: solid;
		border-width: 2px 2px 2px 2px;">
			<strong>Total Registered Units:</strong> <span>{{$total_one_unit + $total_two_unit}}</span>
		</div>







		@endif



		@elseif(!isset($year))
			<!--	<div align="center">
					<img width="150" height="150" src="{{asset('_img/barred.png')}}" >
					<p> No session specified yet<p>
				</div>  -->

				<div align="center">
					<img width="150" height="150" src="{{asset('_img/barred.png')}}" >
					  <p> Only students can carry out course registration<p>
				  </div>
		@else

		

		@endif
	

		

	
    </div>
@endsection

@section('additional_js')
<script src="{{asset('data/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
	<script src="{{asset('data/JSZip-2.5.0/jszip.min.js')}}"></script>

    <script>
function registered_session(value)
{
  window.location.href = "{{ route('course_registration') }}?id="+value;
}
		
@if(Auth::user()->user_type==1)

/*
	var table = $('#dataTable1').DataTable({ 
		//buttons: ['copy', 'excel', 'pdf'],
		//dom : 'Bfrtip',
		searching: false, paging: false, info: false,
		buttons: [
                                 
                                 {
                                    title: 'Registered Courses For ({{isset($session_name)?$session_name:""}})',
                                    extend: 'pdfHtml5',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL',
                                    text: '<i class="fa fa-file-pdf-o"> Download PDF</i>',
                                    titleAttr: 'PDF'
                                }
                ]
		
		});
		table.buttons().container().appendTo($('#button', table.table().container()));*/


@endif
	/*var table  = $('#dataTable1').DataTable({

	
		dom : 'Bfrtip',
        buttons: [
                                 'excel', 
                                 {
                                    title: 'Departmental Monthly Payroll Breakdown',
                                    extend: 'pdfHtml5',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL',
                                    text: '<i class="fa fa-file-pdf-o"> PDF</i>',
                                    titleAttr: 'PDF'
                                }, 'print'
                ]
		
	});

	table.buttons().container().appendTo($('#button', table.table().container())); */
	
function get_programme_list()
		{
           

		   $.ajax(
								 {
									 type:"POST",
									 data:{
										 id : $("#programme_type").val(),
										 _token:$("input[name='_token']").val()
									 },
									 url:"{{route('get_programmes_for_types')}}",
									 beforeSend:function()
									  {
										  $('form#form').block({ message: null }); 
									  },
									  success: function(r)
									  {							  
										 $('form#form').unblock(); 
							              $("#programme_id").html(r);
											// swal("success!", "Operation was successful", "success");
										     //location.reload();
									  }
								 }
				 
						     );
			
		}

            function sem_one_unit_sum()
			{
				var sem_one_unit_sum = 0;
				$('.sem_one_check').each(function () {
					sem_one_unit_sum +=  (this.checked ? $(this).data('unit') : 0) ;
				});
				console.log (sem_one_unit_sum);

				$('#sel_sem1_unit').html(sem_one_unit_sum + " Units")
			}

			function sem_two_unit_sum()
			{
				var sem_two_unit_sum = 0;
				$('.sem_two_check').each(function () {
					sem_two_unit_sum +=  (this.checked ? $(this).data('unit') : 0) ;
				});
				console.log (sem_two_unit_sum);

				$('#sel_sem2_unit').html(sem_two_unit_sum + " Units")
			}
		    
			sem_two_unit_sum();
			sem_one_unit_sum();


			$('#form').submit(function (e, params) {

				var localParams = params || {};

				if (!localParams.send) {
					e.preventDefault();
				}

					//additional input validations can be done hear

				swal({
							title: "Submit Course Registration",
							text: "Are you sure all courses are selected correctly",
							type: "warning",
							showCancelButton: true,
							confirmButtonColor: "#6A9944",
							
							confirmButtonText: "Submit",
							cancelButtonText: "Cancel",
							closeOnConfirm: true
						}, function (isConfirm) {
							if (isConfirm) {
								$(e.currentTarget).trigger(e.type, { 'send': true });
							} else {

						//additional run on cancel  functions can be done hear

				}
        });
});
			

			
						

	
	</script>
@endsection
