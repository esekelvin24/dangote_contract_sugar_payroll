@extends('../layouts.frontend')

@section('title-name')
IAUE :: Management Team
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
        <header class="heading-banner text-white bgCover" style="padding:5px;background-image: url({{asset("_img/team.jpg")}}); background-size: cover; background-repeat: no-repeat">
            <div class="container holder">
                <div class="align">
                    <h1>IAUE :: Management Team </h1>
                </div>
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li><a href="#">About IAUE</a></li>
                    <li class="active">Management Team :: {{$name}}</li>
                </ol>
            </div>
        </nav>
        <section class="container instructor-profile-block">
            <div class="row">
                <!-- profiler aside -->
                <aside class="col-xs-12 col-sm-4 col-lg-3 profiler-aside">
                    <!-- profile info -->
                    <div class="profile-info">
                        <div class="aligncenter">
                            <img src="{{asset("_img/team/".$image)}}" alt="">
                        </div>
                    </div>
                    <!-- text form -->
                </aside>
                <!-- profile desription content -->
                <article class="col-xs-12 col-sm-8 col-lg-9 profile-desription-content">
                    <!-- list feature box -->
                    <div class="list-feature-box">
                        <h3>{{$name}}</h3>
                        <h3 style="font-weight: bold">{{$role}}</h3>
                        {{--<ul class="list-unstyled listDefault">
                            <li>Role: Front End Developer</li>
                            <li>Experience: 12 years</li>
                            <li>Specialist in: Digital Media</li>
                            <li>Current work: Good Studio</li>
                        </ul>--}}
                    </div>
                    <h3>Biography</h3>
                    <div style="text-align: justify">
                        {!! $content !!}
                    </div>
                </article>
            </div>
        </section>

@endsection


@section('additional_js')
    <script>
    </script>
@endsection
