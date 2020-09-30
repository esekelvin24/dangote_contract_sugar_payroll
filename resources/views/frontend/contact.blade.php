@extends('../layouts.frontend')

@section('title-name')
Get in Touch - We'd Love To Hear From You!
@endsection

@section('required_css')
    <link href="{{asset('assets/css/misc.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/main-style.css')}}" rel="stylesheet" type="text/css">
@endsection


@section('content')

    <!--Breadcrumb Section Start-->
    <section class="breadcrumb-bg contact-breadcrumb">
        <div class="theme-container container ">
            <div class="space-top-30"></div>
            <div class="site-breadcumb col-md-4 space-80">
                <h1 class="section-title size-48 no-margin space-bottom-20"> contact us </h1>
                <ol class="breadcrumb breadcrumb-menubar">
                    <li> <a href="{{route('home')}}" class="gray-color"> Home </a> contact </li>
                </ol>
            </div>
        </div>
    </section>
    <!--Breadcrumb Section End-->

    <section class="wrapper space-100">
        <div class="theme-container container">

            <!-- Contact Starts -->
            <div class="row">
                <div class="col-sm-4 contact-box text-center">
                    <div class="space-50">
                        <i class="icon_mobile gray-color size-40"></i>
                        <b class="title-1 light-black">Phone</b>
                        <p><strong>ABUJA</strong></p>
                        <p> 0805 492 2222, 0811 453 3490, 0705 456 7777 </p>
                        <p><strong>AKURE</strong></p>
                        <p> 0906 266 0169, 0903 585 1220, 0809 135 9000 </p>
                        <p><strong>OGBOMOSHO</strong></p>
                        <p>0803 403 6362,  0803 874 4567, 0806 518 4923</p>
                    </div>
                </div>
                <div class="col-sm-4 contact-box text-center">
                    <div class="space-50">
                        <i class="icon_pin_alt gray-color size-40"></i>
                        <b class="title-1 light-black">addresses</b>
                        <p><strong>ABUJA</strong></p>
                        <p>Suite B2-11, Olajumoke Akinjide Shopping Arcade, Dutse, Abuja. </p>
                        <p><strong>AKURE</strong></p>
                        <p>Suite 5, Police Barracks Complex, along St. Lukes Road, Akure. </p>
                        <p><strong>OGBOMOSHO</strong></p>
                        <p>Suite 5, 3rd Floor, Onigbinde Plaza,opposite Bowen Teaching Hospital,Takie, Ogbomosho. </p>
                    </div>
                </div>
                <div class="col-sm-4 contact-box text-center">
                    <div class="space-50">
                        <i class="icon_mail_alt gray-color size-40"></i>
                        <b class="title-1 light-black">email</b>
                        <p><a href="mailto:hello@wallpaperplus.com.ng" title="Email Us">hello@wallpaperplus.com.ng</a></p>
                    </div>
                    <div>
                        <img height="80" width="80" src="{{asset('_img/whatsapp.jpg')}}"/>
                        <b class="title-1 light-black">WhatsApp</b>
                        <p><a href="https://wa.me/2348054922222" title="WhatsApp Chat">Chat With Us</a></p>
                    </div>
                </div>
            </div>
            <!-- / Contact Ends -->

            <!-- Contact Form Starts -->
            {{--<div class="contact-form-wrap text-center space-80 row">
                <form class="contact-form col-md-8 col-md-offset-2">
                    <h2 class="section-title size-18  space-bottom-15">  <span> If you got any questions </span> <span> please do not hesitate to send us a message. </span> </h2>
                    <div class="form-group col-sm-12 form-alert"></div>
                    <div class="">
                        <div class="form-group col-sm-12">
                            <input required="" type="text" title="" data-placement="bottom" data-toggle="tooltip" value="" id="cf_name" name="cf_name" placeholder="Your Name" class="form-control name input-your-name" data-original-title="Name is required">
                        </div>
                        <div class="form-group col-sm-12">
                            <input required="" type="text" title="" data-placement="bottom" data-toggle="tooltip" value="" id="cf_email" name="cf_email" placeholder="Your Email" class="form-control email input-email" data-original-title="Email is required">
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="text" title="" data-placement="bottom" data-toggle="tooltip" value="" id="cf_website" name="cf_website" placeholder="Subject" class="form-control website input-website">
                        </div>
                        <div class="form-group col-sm-12">
                            <textarea title="" data-placement="top" data-toggle="tooltip" id="cf_message" name="cf_message" placeholder="Message" cols="10" rows="3" class="form-control message input-message" data-original-title="Message is required"></textarea>
                        </div>
                        <div class="form-group col-sm-12">
                            <button class="btn-black btn submit-btn" type="submit"> <b> Send Message </b> </button>
                        </div>
                    </div>
                </form>
            </div>--}}
            <!-- Contact Form Ends -->

        </div>

    </section>
@endsection

@section('required_js')
@endsection

@section('additional_js')
@endsection

