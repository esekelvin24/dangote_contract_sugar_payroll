@extends('../layouts.frontend')

@section('title-name')
About US : Get To Know Us
@endsection

@section('required_css')
	<link href="{{asset('assets/css/misc.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/main-style.css')}}" rel="stylesheet" type="text/css">
@endsection


@section('content')

	<!--Breadcrumb Section Start-->
	<section class="breadcrumb-bg about-breadcrumb">
		<div class="theme-container container ">
			<div class="space-top-30"></div>
			<div class="site-breadcumb col-md-4 space-80">
				<h1 class="section-title size-48 no-margin space-bottom-20"> about us </h1>
				<ol class="breadcrumb breadcrumb-menubar">
					<li> <a href="{{route('home')}}" class="red-color"> Home </a> <a href="{{route('about')}}" class="red-color"> About US</a> </li>
				</ol>
			</div>
		</div>
	</section>
	<!--Breadcrumb Section End-->

	<section class="wrapper space-100">
		<div class="theme-container container">
			<!-- About Starts -->
			<div class="row">
				<div class="about-box">
					<div class="col-sm-4 space-bottom-10">
						<h2 class="section-title size-24 no-margin"> WHO WE ARE </h2>
						<article class="post-wrap space-bottom-40">
							<div class="post-header">
								<a href="#" class="post-title size-18"> OUR CORE VALUES </a>
								<ul class="list-items font-2 post-meta">
									<li> <span class="label label-info"> Integrity Value</span> </li>
									<li> <span class="label label-success"> Excellence </span> </li>
									<li> <span class="label label-primary"> Professionalism </span> </li>
								</ul>
							</div>
						</article>
					</div>
					<div class="col-sm-8 about-info space-bottom-50">
						<p style="text-align: justify"> Wallpapers<sup>+</sup> 'N' Interiors is an interior design company which started in 2015 specializing in the sale and installation of exotic wallpapers an other interior decorations.
						 We have been at the forefront of Wallpapers designs, interiors and
							exteriors designs for both commercials
							and residential for over 4 years with special
							attention in space management and value. Our head office is located in Abuja with branches in Akure and Ogbomosho.  </p>
					</div>
				</div>
				<div class="about-box">
					<div class="col-sm-4 space-bottom-10">
						<h2 class="section-title size-24 no-margin"> WHAT WE DO </h2>
						<article class="post-wrap space-bottom-40">
							<div class="post-media space-bottom-40">
								<div class="owl-carousel blog-slider">
									<div class="item">
										<a href="#"> <img src="{{asset("_img/abt/front.JPG")}}" alt=""> </a>
									</div>
									<div class="item">
										<a href="#"> <img src="{{asset("_img/abt/one.jpg")}}" alt=""> </a>
									</div>
									<div class="item">
										<a href="#"> <img src="{{asset("_img/abt/two.jpg")}}" alt=""> </a>
									</div>
								</div>
							</div>
						</article>
					</div>
					<div class="col-sm-8 about-info space-bottom-50">
						<p style="text-align: justify"> We offer professional interior and exterior finishing, ranging from floor designs to wall designs and general beautification of spaces. We also sell interior decorative pieces and materials. We deliver excellent service through highly skilled
							professionals. Wallpapers+ 'N' Interiors offer a
							comprehensive range of Interiors and exteriors
							designs, Products and Services:</p>
						<p><span style="font-size: 18px; font-weight: bold">PRODUCTS</span><br/>3D Wallpapers, Embroidery Wallpapers, 3D Boards,
							Suede Wallpapers.</p>
						<p> Our uniqueness in the business of wall papers is in our detail to specifications. The thickness and quality cannot be matched in the market. Our wallpapers are durable and can last between 5-10 years depending on usage. They are reusable and washable unlike what is obtainable in the general market. </p>
						<p> They are sort after because they are: </p>
						<div class="row">
							<div class="col-xm-6 col-sm-3 col-md-3 col-lg-3" >
                                <i style="font-size: 65px; color:red" class="icon_gift"></i>
                                <p>EXOTIC</p>
							</div>
							<div class="col-xm-6 col-sm-3 col-md-3 col-lg-3">
                                <i style="font-size: 65px; color:red" class="icon_shield_alt"></i>
                                <p>DURABLE</p>
							</div>
							<div class="col-xm-6 col-sm-3 col-md-3 col-lg-3">
                                <i style="font-size: 65px; color:red" class="icon_tag"></i>
                                <p>WASHABLE</p>
							</div>
							<div class="col-xm-6 col-sm-3 col-md-3 col-lg-3">
                                <i style="font-size: 65px; color:red" class="icon_refresh"></i>
                                <p>RE-USABLE</p>
							</div>
						</div>
						<br/><br/>
						<p><span style="font-size: 18px; font-weight: bold">SERVICES</span></p>
						<p style="text-align: justify; margin-top: -10px"> Design Planning and Concept Development, Interior Decorations, Installations,
							Interior Designs, Project Management and Monitoring, and Consultancy.<br/>
							We have manufacturing partners that produce wallpapers based on customers
							specification and needs with 10 years guarantee.
							Our Designs are dynamic, unique and unconventional with what is seen today
							in the open market while maintaining project cost.
							We bring talents and professionalism together to give you value for your
							money, transforming spaces with cutting edge technology as well having
							something for everybody that is within your budget.
						<br/><br/>
							Our Unique products and services reflect diverse portfolio of 21st century
							designs which carries our hallmark of creativity, innovations,
							professionalism and quality assured.
							We do a total review of your space and ensure the perfect creative
							design that best fit in the available Space.
						<br/><br/>
							With our well trained and seasoned professionals, we therefore plan and
							conceptualize your space, interior and exterior designs.<br/>
							Your house or office cannot be complete without that elegant and
							beautiful interior design touches. Therefore, with total space
							transformation, we will give you that perfect furniture design, fabric
							selection, beautiful colours combination, lighting designs and selections,
							complimentary art and wall painting designs, and accessories that best
							fit the finishing and gives it the aesthetics look it deserved.
						</p>

					</div>
				</div>

				</div>
			</div>
			<!-- / About Ends -->

		</div>
	</section>
@endsection

@section('additional_js')
	<script type="text/javascript">
		jQuery(function($){
			$(".owl-carousel").owlCarousel(
					{
						loop:true,
						items:1,
						nav:true,
						autoplay:true,
						autoplayTimeout:6000,
						autoplayHoverPause:true
					}
			);
		})

		/*jQuery(function($) {
			var resizeTimer, container;
			var max_slides_28119 = 1,
					slide_margin_28119 = 0,
					max_width_28119 = '55%';
			var opts = {
				auto: false,
				pause: 4000,
				controls: true,
				mode: 'horizontal',
				speed: 500,
				infiniteLoop: false,
				maxSlides: 1,
				minSlides: 1,
				moveSlides: 1,
				slideWidth: 500,
				slideMargin: 0,
				pager: true,
				adaptiveHeight: false,
				onSliderLoad: function() {
					setTimeout(function() {
						$('#boxslider_container_28119').css('max-height', 'none');
						$('#boxslider_container_28119').css('overflow', 'none');
					}, 200);
					$('#boxslider_container_28119 .slider-loading').hide();
				}
			};
			var resized = false,
					window_width = $(window).width();
			container = $('#boxslider_container_28119');
			if (window_width < 480) {
				container.css('width', '100%');
			} else {
				container.css('width', max_width_28119);
			}
			new_opts = beforeResizeBxSlider(opts, max_slides_28119, slide_margin_28119, window_width);
			var bxSlider_28119 = $('#boxslider_28119').bxSlider(new_opts);
			$(window).on('resize', function() {
				clearTimeout(resizeTimer);
				resizeTimer = setTimeout(function() {
					container = $('#boxslider_container_28119');
					if (resizeTimer) clearTimeout(resizeTimer);
					//if (resized && Math.abs($(window).width() - window_width) <= 0) return;
					resized = true;
					window_width = $(window).width();
					if (window_width < 480) {
						container.css('width', '100%');
					} else {
						container.css('width', max_width_28119);
					}
					new_opts = beforeResizeBxSlider(opts, max_slides_28119, slide_margin_28119, window_width);
					bxSlider_28119.reloadSlider(new_opts);
				}, 250);
			});
		});*/
	</script>
@endsection
