@extends('../layouts.frontend')

@section('title-name')
Welcome to Ignatius Ajuru University Distance Learning Portal
@endsection

@section('required_css')

@endsection



@section('content')
    <!-- intro block -->
    <section class="intro-block">
        <div class="slider fade-slider">
            <div>
                <!-- intro block slide -->
                <article class="intro-block-slide overlay bg-cover" style="background-image: url({{asset("frontend/images/study.jpg")}}); background-size:cover; background-repeat: no-repeat">
                    <div class="align-wrap container">
                        <div class="align">
                            <div class="anim">
                                <h1 class="intro-block-heading">Gain International Exposure</h1>
                            </div>
                            <div class="anim delay1">
                                <p>Study in the United Kingdom or Ukraine</p>
                            </div>
                            <div class="anim delay2">
                                <div class="btns-wrap">
                                    <a href="#" onclick="document.getElementById('cross_border').submit();" class="btn btn-warning btn-theme text-uppercase">View Programmes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div>
                <!-- intro block slide -->
                <article class="intro-block-slide overlay bg-cover" style="background-image: url({{asset("frontend/images/landing1.jpg")}}); background-size:cover; background-repeat: no-repeat">
                    <div class="align-wrap container">
                        <div class="align">
                            <div class="anim">
                                <h1 class="intro-block-heading">What Starts Here Changes the World</h1>
                            </div>
                            <div class="anim delay1">
                                <p>We offer the most complete course package in the country, for the research, design and development of Education.</p>
                            </div>
                                <div class="anim delay2">
                                    <div class="btns-wrap">
                                        <a href="{{route("programmes")}}" class="btn btn-warning btn-theme text-uppercase">Our Programmes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </article>
            </div>
            <div>
                <!-- intro block slide -->
                <article class="intro-block-slide overlay bg-cover" style="background-image: url({{asset("frontend/images/landing2.jpg")}}); background-size:cover; background-repeat: no-repeat">
                    <div class="align-wrap container">
                        <div class="align">
                            <div class="anim">
                                <h1 class="intro-block-heading">Education Organization</h1>
                            </div>
                            <div class="anim delay1">
                                <p>We offer the most complete course pakage in the country, for the research, design and development of Education.</p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="container">
            <!-- features aside -->
            <aside class="features-aside">
                <a href="{{route('specific_cross_programme',base64_encode(2))}}" class="col here" >
							<span class="icn-wrap text-center no-shrink">
								<img src="{{asset("frontend/images/icon02.svg")}}" width="44" height="43" alt="trophy">
							</span>
                    <div class="description">
                        <h2 class="features-aside-heading">Study in London</h2>
                        <span class="view-more element-block text-uppercase">view more</span>
                    </div>
                </a>
                <a href="{{route('specific_cross_programme',base64_encode(1))}}" class="col">
							<span class="icn-wrap text-center no-shrink">
								<img src="{{asset("frontend/images/icon02.svg")}}" width="43" height="39" alt="computer">
							</span>
                    <div class="description">
                        <h2 class="features-aside-heading">Study in Ukraine</h2>
                        <span class="view-more element-block text-uppercase">view more</span>
                    </div>
                </a>
                <a href="{{route("fee_breakdown")}}" class="col">
							<span class="icn-wrap text-center no-shrink">
								<img src="{{asset("frontend/images/icon04.svg")}}" width="43" height="39" alt="computer">
							</span>
                    <div class="description">
                        <h2 class="features-aside-heading">Affordable Fees</h2>
                        <span class="view-more element-block text-uppercase">view more</span>
                    </div>
                </a>
            </aside>
        </div>
    </section>

    <!-- popular posts block -->
    <section class="popular-posts-block container">
        <header class="popular-posts-head">
            <h2 class="popular-head-heading">Latest News</h2>
        </header>
        <div class="row">
            <!-- popular posts slider -->
            <div class="slider popular-posts-slider">
                
               

                @if(count($news_collection) > 0)
                    @foreach($news_collection as $val)
                        <div >
                            <div  class="col-xs-12">
                                <!-- popular post -->
                                <article  class="popular-post" style="min-height: 270px;">
                                    <a href="{{route("news_details",base64_encode($val->news_id))}}">  <div class="aligncenter">
                                         <img style="min-width:263px; min-heigh:132px" src="{{asset("images/news/".$val->img_path)}}" alt="image description">
                                    </div>
                                   </a>
                                    <h3 class="post-heading"><a href="{{route("news_details",base64_encode($val->news_id))}}">{{substr($val->news_title,0,40)}}</a></h3>
                                    <div class="post-author">
                                        <div class="alignleft rounded-circle no-shrink">
                                            <a href="#"><img src="http://placehold.it/35x35" class="rounded-circle" alt="image description"></a>
                                        </div>
                                        @php
                                            $date = date_create($val->created_at);
                                        @endphp
                                        <h6 class="author-heading">{{date_format($date, ' jS F Y g:ia \o\n l')}}</h6>
                                    </div>
                                </article>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <!-- popular post -->
                            
                              <p style="margin-left:20px">No news posted</p>
                      

                   @endif


            </div>
        </div>
    </section>

    <!-- upcoming events block -->
    <section class="upcoming-events-block container">
        <header class="block-header">
            <div class="pull-left">
                <h2 class="block-header-heading">Upcoming Events</h2>
                <p>Recent and upcoming educational events listed here</p>
            </div>
            <a href="{{route('event')}}" class="btn btn-default text-uppercase pull-right">View More</a>
        </header>
        <!-- upcoming events list -->
        <ul class="list-unstyled upcoming-events-list">
            
            @if(count($event_collection) > 0)

             @foreach($event_collection as $val)
                <li>
                    <div class="alignright">
                        <a href="{{route("event_details",base64_encode($val->event_id))}}"> <img style="max-width:221px; max-height:87px; min-width:221px; min-height:87px; " src="{{asset("images/events/".$val->img_path)}}" alt="image description"></a>
                    </div>

                    <div class="alignleft">
                        <time datetime="2011-01-12" class="time text-uppercase">
                            <strong class="date fw-normal">{{ date('d', strtotime($val->event_date))}}</strong>
                            <strong class="month fw-light font-lato">{{date('F', strtotime($val->event_date))}}</strong>
                            <strong class="day fw-light font-lato">{{ date('D', strtotime($val->event_date))}}</strong>
                        </time>
                    </div>
                    <div class="description-wrap">
                        <h3 class="list-heading"><a href="{{route("event_details",base64_encode($val->event_id))}}">{{$val->event_title}}</a></h3>

                        @php
                            $start_time = date_create($val->event_start_time);
                            $end_time = date_create($val->event_end_time);
                        @endphp
                        <address><time datetime="2011-01-12">{{date_format($start_time, 'g:i A')}} - {{date_format($end_time, 'g:i A')}}</time> | {{$val->event_venue}}</address>
                    </div>
                </li>
              @endforeach
              
            @else

            <p>No event posted</p>

            @endif

        </ul>
    </section>

@endsection



@section('additional_js')
@endsection
