@extends('../layouts.frontend')

@section('title-name')
IAUE News Details
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
                    <h1>News Details</h1>
                </div>
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li><a href="{{route("news")}}">News</a></li>
                    <li class="active">News Details</li>
                </ol>
            </div>
        </nav>



        <section class="container instructor-profile-block">
            <div class="row">
                <!-- profiler aside -->
                <aside class="col-xs-12 col-sm-4 col-lg-3 profiler-aside">
                    <!-- profile info -->
                    <section class="widget widget_popular_posts">
                        <h3>Latest News</h3>
                        <!-- widget cources list -->
                        <ul class="widget-cources-list list-unstyled">
                            @foreach($news_side_collection as $val)
                            <li>
                                <a href="{{route("news_details",base64_encode($val->news_id))}}">
                                    <div class="alignleft">
                                        <img style="max-width:80px; max-height:70px" src="{{asset("images/news/".$val->img_path)}}" alt="image description">
                                    </div>
                                    <div class="description-wrap">
                                        <h4>{{$val->news_title}}</h4>
                                        <time datetime="2011-01-12" class="text-gray element-block">{{ date('d F D Y', strtotime($val->created_at))}}</time>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                            
                        </ul>
                    </section>
        
                </aside>
                <!-- profile desription content -->
                
                @foreach($news_collection as $val)

                <article class="col-xs-12 col-sm-8 col-lg-9 profile-desription-content">
                   
                        <div class="aligncenter">
                            <img style="max-width:828px; max-height:430px; min-width:828px; min-height:430px;" src="{{asset('images/news/'.$val->img_path)}}" alt="image description">
                        </div>
                        <h1>{{$val->news_title}}</h1>
                        <!-- postActionsInfo -->

                       
                        <ul class="list-unstyled postActionsInfo text-uppercase">
                            <li><a href="#"><i class="far fa-clock icn"></i> <time datetime="2011-01-12">{{ date('d F D Y', strtotime($val->created_at))}}</time></a></li>
                            <li><a href="#"><i class="far fa-user icn"></i> Admin</a></li>
                            @if($val->file == 1)
                              <li><a style="color:red" target="_blank" href="{{asset("file_upload/news/".$val->file_path)}}"><i class="fa fa-download icn"></i> Download Attachment </a></li>
                            @endif
                        </ul>
                        
                        {!!$val->news_content!!}

                        
                    
                </article>
                @endforeach


            </div>
        </section>
        

@endsection


@section('additional_js')
    <script>
    </script>
@endsection
