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
                    <h1>IAUE :: Management Team</h1>
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
                    <li class="active">Management Team</li>
                </ol>
            </div>
        </nav>
        <section class="container professionals-block">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <!-- pro column -->
                    <article class="pro-column over text-center">
                        <div class="aligncenter">
                            <a href="{{route('team',base64_encode(1))}}"><img src="{{asset("_img/team/keziah.png")}}" alt=""></a>
                        </div>
                        <h3 class="fw-normal text-capitalize" style="text-transform: uppercase"><a href="{{route('team',base64_encode(1))}}">PROF KEZIAH ACHUONYE</a></h3>
                        <h4 class="fw-normal text-capitalize" style="text-transform: uppercase; font-weight: bold">Deputy Director</h4>
                    </article>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <!-- pro column -->
                    <article class="pro-column over text-center">
                        <div class="aligncenter">
                            <a href="{{route('team',base64_encode(2))}}"><img src="{{asset("_img/team/trinya.png")}}" alt=""></a>
                        </div>
                        <h3 class="fw-normal text-capitalize" style="text-transform: uppercase"><a href="{{route('team',base64_encode(2))}}">Prof Kontein Trinya</a></h3>
                        <h4 class="fw-normal text-capitalize" style="text-transform: uppercase; font-weight: bold">Director</h4>
                    </article>
                </div>
            </div>
        </section>

@endsection


@section('additional_js')
    <script>
    </script>
@endsection
