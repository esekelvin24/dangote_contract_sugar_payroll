
@extends('../layouts.frontend')

@section('title-name')
IAUE News
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
        <header class="heading-banner text-white bgCover" style="padding:5px;background-image: url({{asset("_img/news.jpeg")}}); background-size: cover; background-repeat: no-repeat">
            <div class="container holder">
                <div class="align">
                    <h1>News</h1>
                </div>
                
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li class="active">News</li>
                </ol>
            </div>
        </nav>
       
        <section class="upcoming-events-block container">
            @if(count($news_collection) > 0)
            <!-- upcoming events list -->
            <ul class="list-unstyled upcoming-events-list">
                
                @if(count($news_collection) > 0)
                    @foreach($news_collection as $val)
                        <li>
                            <div class="alignright">
                                <a href="{{route("news_details",base64_encode($val->news_id))}}"> <img style="max-width:221px; max-height:87px; min-width:221px; min-height:87px; " src="{{asset("images/news/".$val->img_path)}}" alt="image description"></a>
                            </div>

                           <!-- <div class="alignleft">
                                <time datetime="2011-01-12" class="time text-uppercase">
                                    <strong class="date fw-normal">{{ date('d', strtotime($val->created_at))}}</strong>
                                    <strong class="month fw-light font-lato">{{date('F', strtotime($val->created_at))}}</strong>
                                    <strong class="day fw-light font-lato">{{ date('D', strtotime($val->created_at))}}</strong>
                                </time>
                            </div>-->
                            <div class="description-wrap">
                                <h3 class="list-heading"><a href="{{route("news_details",base64_encode($val->news_id))}}">{{$val->news_title}}</a></h3>
                                <p>{!!substr($val->news_content,0,180)!!}</p>
                                @php
                                    $start_time = date_create($val->created_at);
                                
                                @endphp
                                <address><i class="far fa-calendar icn"></i> {{ date('d F Y', strtotime($val->created_at))}}  | <i class="far fa-clock icn"></i> <time datetime="2011-01-12">{{date_format($start_time, 'g:i A')}}</time> | <i class="far fa-user icn"></i> By Admin</address>
                            </div>
                        </li>
                    @endforeach
            
            @endif
              
            </ul>

            {{ $news_collection->links() }}
            @else
             <div align="center"> <img style="width:450px" src="{{asset("_img/no_record.png")}}" alt="image description"></div>
             <br/>
             <br/>
            @endif
            
        </section>
       
       

@endsection


@section('additional_js')
    <script>
    </script>
@endsection
