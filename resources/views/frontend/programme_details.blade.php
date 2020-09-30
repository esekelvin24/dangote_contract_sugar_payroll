@extends('../layouts.frontend')

@section('title-name')
IAUE University Distance Programme Details
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
                    <h1>Programme Details</h1>
                </div>
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li><a href="{{route("programmes")}}">Programme Details</a></li>
                    <li class="active">Programme Details</li>
                </ol>
            </div>
        </nav>
        @foreach($programme_collection as $val)
        <div id="two-columns" class="container">
            <div class="row">
                <!-- content -->
                <article id="content" class="col-xs-12 col-md-9">
                    <!-- content h1 -->
                    <h1 class="content-h1 fw-semi">{{$val->degree_short_name." , ".$val->name}} {!! $val->university_id?" <span style='text-transform:uppercase; font-size:19px;'>($val->university)</span>":"" !!}</h1>
                    <!-- view header -->
                    <header class="view-header row">
                        <div class="col-xs-12 col-sm-9 d-flex">
                            <div class="d-col">
                                <div class="post-author">
                                    <div class="alignleft no-shrink icn-wrap">
                                        <i style="font-size: 17px; padding-top: 10px" class="fa fa-user-circle"></i>
                                    </div>
                                    <div class="description-wrap">
                                        <h2 class="author-heading">Programme Type</h2>
                                        <h3 class="author-heading-subtitle text-uppercase">{{$val->program_type_name}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="d-col">
                                <div class="post-author">
                                    <div class="alignleft no-shrink icn-wrap">
                                        <i style="font-size: 17px; padding-top: 10px" class="fa fa-graduation-cap"></i>
                                    </div>
                                    <div class="description-wrap">
                                        <h2 class="author-heading">Faculty</h2>
                                        <h3 class="author-heading-subtitle text-uppercase">{{$val->faculty_name}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="d-col">
                                <div class="post-author">
                                    <div class="alignleft no-shrink icn-wrap">
                                        <i style="font-size: 17px; padding-top: 10px" class="fa fa-anchor"></i>
                                    </div>
                                    <div class="description-wrap">
                                        <h2 class="author-heading">Department</h2>
                                        <h3 class="author-heading-subtitle text-uppercase">{{$val->department_name}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </header>
                    {{--<div class="aligncenter content-aligncenter">
                        <img src="http://placehold.it/828x430" alt="image description">
                    </div>--}}

                    <div style="text-align: justify; padding: 5px 10px">
                        {!! $val->description !!}
                    </div>

                    <h2>Normal Entry Requirement</h2>
                    <div style="text-align: justify; padding: 5px 10px">
                        {!! trim($val->normal_entry_requirement)==""?"--Not stated--":$val->normal_entry_requirement !!}
                    </div>

                    @if($val->accepts_direct_entry)
                    <h2>Direct Entry Requirement</h2>
                    <div style="text-align: justify; padding: 5px 10px">
                        {!! trim($val->direct_entry_requirement)==""?"--Not stated--":$val->direct_entry_requirement !!}
                    </div>
                    @endif

                    @if(isset($year) && trim($year)!="")

                    <h2>Curriculum</h2>

                    <!-- sectionRow -->
                    <section class="sectionRow">
                       
                        <!-- sectionRowPanelGroup -->
                        <div class="panel-group sectionRowPanelGroup" id="accordion" role="tablist" aria-multiselectable="true">
                            
                            @if(count($courses_collection) > 0 || count($cross_courses_collection) > 0)

                            @for ($i = 1; $i <= $year; $i++)

                            
                                <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h3 class="panel-title fw-normal">
                                            <a class="accOpener" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo{{$i}}" aria-expanded="false" aria-controls="collapseTwo">
                                                        <span class="accOpenerCol">
                                                            <i class="fas fa-chevron-circle-right accOpenerIcn"></i><i class="far fa-file inlineIcn"></i> YEAR {{$i}}</span>
                                                        </span>
                                                    
                                                </a>
                                            </h3>
                                        </div>
                                        <!-- collapseOne -->
                                        <div id="collapseTwo{{$i}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel- body">
                                                <table class="table table-bordred table-striped">
                                                    <thead style="background-color: lightgoldenrodyellow; color: midnightblue">
                                                    <tr> 
                                                        <th>Title</th>
                                                        <th>Short Code</th>
                                                        <th>Credit Unit</th>
                                                        <th>Category</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                     @foreach ($courses_collection as $cours_val)
                                                        @if($cours_val->year == $i)
                                                            <tr>  
                                                                <td>{{$cours_val->course_title}}</td>
                                                                <td>{{$cours_val->short_code}}</td>
                                                                <td>{{$cours_val->unit}}</td> 
                                                                <td>{{$cours_val->category==1?"Mandatory":"Elective"}}</td>
                                                            </tr>
                                                         @endif
                                                        @endforeach

                                                        @foreach ($cross_courses_collection as $cours_val)
                                                        @if($cours_val->cross_course_year == $i)
                                                            <tr>  
                                                                <td>{{$cours_val->course_title}}</td>
                                                                <td>{{$cours_val->short_code}}</td>
                                                                <td>{{$cours_val->cross_course_unit}}</td> 
                                                                <td>{{$cours_val->cross_course_category==1?"Mandatory":"Elective"}}</td>
                                                            </tr>
                                                         @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endfor
                            @endif
                            <!-- panel -->
                           
                           
                        </div>
                    </section>

                    @endif

                    <!-- bookmarkFoot -->
                    {{--<div class="bookmarkFoot">
                        <div class="bookmarkCol text-right">
                            <a href="#" class="btn btn-theme btn-warning text-uppercase fw-bold">APPLY FOR THIS PROGRAMME</a>
                        </div>
                    </div>--}}
                </article>
                <!-- sidebar -->
                <aside class="col-xs-12 col-md-3" id="sidebar">
                    <!-- widget course select -->
                    <section class="widget widget_box widget_course_select">
                        <header class="widgetHead text-center bg-theme" style="background-color: #ffc000">
                            <h3 class="text-uppercase"><a href="{{route("apply",base64_encode($val->programme_id))}}" class="btn btn-theme btn-warning text-uppercase fw-bold" style="background-color: #e32402;">APPLY FOR THIS PROGRAMME</a></h3>
                        </header>
                        {{--<strong class="price element-block font-lato" data-label="total price :">N150,000.00</strong>--}}
                        <ul class="list-unstyled font-lato">
                            <li><i class="far fa-clock icn no-shrink"></i> Duration: {{$val->duration}}</li>
                            <li><i class="fas fa-bullhorn icn no-shrink"></i> Degree Type: {{$val->degree_name}}</li>
                            <li><i class="far fa-address-card icn no-shrink"></i> {{$val->degree_class==1?"Undergraduate":"Post Graduate"}}</li>
                        </ul>
                    </section>
                    <!-- widget categories -->
                    {{--<section class="widget widget_categories">
                        <h3>Specific Programme Fee Breakdown</h3>
                        <h5>Kindly refer to the fee breakdown page for generic programme fees.</h5>
                        <ul class="list-unstyled text-capitalize font-lato">
                            <li class="cat-item cat-item-1">Housing Programme Fee: N5,000</li>
                            <li class="cat-item cat-item-1">N7,000</li>
                        </ul>
                    </section>--}}
                </aside>
            </div>
        </div>
        @endforeach

@endsection


@section('additional_js')
    <script>
    </script>
@endsection
