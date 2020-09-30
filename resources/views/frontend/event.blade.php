@extends('../layouts.frontend')

@section('title-name')
IAUE Events
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
                    <h1>Events</h1>
                </div>
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li class="active">Events</li>
                </ol>
            </div>
        </nav>
       
        <section class="upcoming-events-block container">
            @if(count($event_collection) > 0)
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
            @endif
              
            </ul>

            {{ $event_collection->links() }}
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
