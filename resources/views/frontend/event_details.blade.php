@extends('../layouts.frontend')

@section('title-name')
IAUE Event Details
@endsection

@section('required_css')
@endsection

<style>
    .header-holder.sticky .main-navigation.navbar-right > li > a {
        color:white !important;
    }
</style>
@section('content')
        <!-- heading banner -->
        <header class="heading-banner text-white bgCover" style="padding:5px;background-image: url({{asset("_img/plain.jpg")}}); background-size: cover; background-repeat: no-repeat">
            <div class="container holder">
                <div class="align">
                    <h1>Event Details</h1>
                </div>
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li><a href="{{route("event")}}">Events</a></li>
                    <li class="active">Event Details</li>
                </ol>
            </div>
        </nav>



        <section class="container instructor-profile-block">
            <div class="row">
                <!-- profiler aside --
                <aside class="col-xs-12 col-sm-4 col-lg-3 profiler-aside">
                    <!-- profile info --
                    <div class="profile-info bg-dark">
                        <div class="aligncenter">
                            <img style="max-width:262px; max-height:210px" src="{{asset('_img/side_img.jpg')}}" alt="Lospher Cook">
                        </div>
                        <dl>
                            <dt><i class="fas fa-mobile-alt"></i></dt>
                            <dd><a href="tel:+2348057142374">+234 805 714 2374</a></dd>
                            <dt><i class="fas fa-phone fa-flip-horizontal"></i></dt>
                            <dd><a href="tel:+2348121835158">+234 812 183 5158</a></dd>
                            <dt><i class="far fa-envelope"></i></dt>
                            <dd><a href="mailto:info@iaue.edu.ng">info@iaue.edu.ng</a></dd>
                        </dl>
                        <hr class="sep">
                        <ul class="socail-networks list-unstyled">
                            <li><a href="https://facebook.com/iauoeph/" class="facebook"><span class="fab fa-facebook-f"></span></a></li>
                            <li><a href="https://twitter.com/iauephc/" class="twitter"><span class="fab fa-twitter"></span></a></li>
                            
                        </ul>
                    </div>
                    
        
                </aside>
                <!-- profile desription content -->
                
                <article class="col-xs-12 col-sm-8 col-lg-9 profile-desription-content">
                    @if(count($event_collection) > 0)
                        @foreach($event_collection as $val)
                            <!-- visualImageHolder -->
                <h1 style="position:relative; top:-30px;">{{$val->event_title}}</h1>
                            <div class="aligncenter visualImageHolder">
                                <img style="max-width:828px; max-height:430px; min-width:828px; min-height:430px;" src="{{asset('images/events/'.$val->img_path)}}" alt="image description">
                                <!-- captionAddress -->
                                @php
                                  $date = date_create($val->event_date);
                                  $start_time = date_create($val->event_start_time);
                                  $end_time = date_create($val->event_end_time);
                                @endphp
                                <address class="captionAddress bg-theme">
                                    <div class="addressColumn">
                                        <i class="far fa-clock icn text-white"></i>
                                        <strong class="title text-uppercase fw-semi element-block">start time :</strong>
                                    <strong style="color:wheat !important;" class="fw-normal element-block"><time > {{date_format($date, ' l jS F Y')}} AT {{date_format($start_time, 'g:i A')}}</time></strong>
                                    </div>
                                    <div class="addressColumn">
                                        <i class="far fa-flag icn text-white"></i>
                                        <strong class="title text-uppercase fw-semi element-block">Finish time :</strong>
                                        <strong style="color:wheat !important;" class="fw-normal element-block"><time >{{date_format($date, ' l jS F Y')}} AT {{date_format($end_time, 'g:i A')}}</time></strong>
                                    </div>
                                    <div class="addressColumn">
                                        <i class="fas fa-map-marker-alt icn text-white"></i>
                                        <strong class="title text-uppercase fw-semi element-block">Venue:</strong>
                                        <strong style="color:wheat !important;" class="fw-normal element-block">{{$val->event_venue}}</strong>
                                    </div>
                                </address>
                            </div>
                            <ul class="list-unstyled postActionsInfo text-uppercase">
                                
                                @if($val->file == 1)
                                  <li><a style="color:red" target="_blank" href="{{asset("file_upload/events/".$val->file_path)}}"><i class="fa fa-download icn"></i> Download Attachment </a></li>
                                @endif
                            </ul>
                            {!!$val->event_content!!}

                            

                            @endforeach	
                @endif   
                </article>


            </div>
        </section>
        

@endsection


@section('additional_js')
    <script>
    </script>
@endsection
