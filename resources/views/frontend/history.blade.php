@extends('../layouts.frontend')

@section('title-name')
IAUE :: Our History
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
        <header class="heading-banner text-white bgCover" style="padding:5px;background-image: url({{asset("_img/history.jpg")}}); background-size: cover; background-repeat: no-repeat">
            <div class="container holder">
                <div class="align">
                    <h1>IAUE :: Our History</h1>
                </div>
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li><a href="#">About IAEU</a></li>
                    <li class="active">Our History</li>
                </ol>
            </div>
        </nav>
        <div id="two-columns" class="container">
            <div class="row">
                <!-- content -->
                <article id="content" class="col-xs-12 col-md-12">
                    <div style="text-align: justify; padding: 5px 10px; font-size: 14px">
                        <p>
                        Distance learning at Ignatius Ajuru University of Education, Port Harcourt, owes its inception particularly to the impetus of the Vice Chancellor, Prof Ozo-Mekuri Ndimele, who gave the project uncommon support.  <br/><br/>Following a short conference on distance learning organised jointly by the National Universities Commission and the University of London in 2018, a proposal was presented by Prof Kontein Trinya to the University Senate for approval to start distance learning.  That approval was promptly granted, followed also by Council ratification, to start with a programme in Economics.
                        </p>
                        <p>
                        Soon after, negotiations began with the University of London and other international institutions, defining study centre and distance learning partnerships.  The Institute for Distance Learning at Ignatius Ajuru University of Education, thanks to the development initiatives of the Vice Chancellor, has been driven with a mission to internationalise leaning at the university, to be the best distance learning centre in West Africa, and especially to provide broadened learning opportunities to its southern Nigeria populations.
                        </p>
                        <p>
                        Programmes at The Institute are same as offered in the traditional fulltime classroom interface.  At the end of the programme, candidates shall be awarded the same degree as in the campus-based programmes.  Distance learning, by uniquely bridging space and time between learner and tutor, is gradually becoming the preference of learners in our ever-busy contemporary society.  Learning is generally at the leaner’s pace from the learner’s place, normally over the world wide web.  Come over and enjoy the experience at The Institute.
                        </p>
                        <h3>Prof Kontein Trinya</h3>
                        <h5>Pioneer Director</h5>
                    </div>

                </article>
            </div>
        </div>

@endsection


@section('additional_js')
    <script>
    </script>
@endsection
