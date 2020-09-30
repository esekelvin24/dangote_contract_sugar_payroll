@extends('../layouts.frontend')

@section('title-name')
Applications at IAUE
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
                    <h1>IAUE University Distance Learning Programmes</h1>
                </div>
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li class="active">IAUE Offered Programmes</li>
                </ol>
            </div>
        </nav>

        <div id="two-columns" class="container">
            <div class="row">
                <!-- content -->

                    <!-- content -->
                    <!-- show head -->
                   <div class="container">
                       <form id="search" action="{{route('programme_filter')}}" method="post">
                           @csrf
                          <div class="row" style="margin-top: 40px; padding: 0px 60px;">
                                <div class="col-xs-12 col-md-3 col-sm-3" style="padding-top: 15px">
                                    <select id="programme_type_id" name="programme_type_id" style="width:100%; height: 40px; border-radius: 5px">
                                        <option value="" selected>All Programme Type</option>
                                        @foreach($programme_type_collection as $val)
                                            <option value="{{ $val->program_type_id }}">{{ $val->program_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xs-12 col-md-3 col-sm-3" style="padding-top: 15px; padding-bottom: 15px">
                                    <select id="faculty_id" name="faculty_id" style="width:100%; height: 40px; border-radius: 5px">
                                        <option value="" selected>All Faculties</option>
                                        @foreach($faculty_collection as $val)
                                            <option value="{{ $val->faculty_id }}">{{ $val->faculty_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                              <div class="col-xs-12 col-md-3 col-sm-3" style="padding-top: 15px">
                                  <select id="department_id" name="department_id" style="width:100%; height: 40px; border-radius: 5px">
                                      <option value="" selected>All Departments</option>
                                  </select>
                              </div>

                              <div class="col-xs-12 col-md-3 col-sm-3">
                                  <div class="btns-wrap">
                                      <div class="wrap">
                                          <button type="submit" class="submit btn btn-theme btn-warning fw-bold font-lato text-uppercase" style="background-color: #cc9a00 !important; width:100%; margin-top: 15px; border-radius: 5px">Filter</button>
                                      </div>
                                  </div>
                              </div>
                            </div>
                       </form>

                   </div>

                <section id="content" class="col-xs-12 col-md-12">
                    <!-- programmes -->

                    @if(isset($search))
                        <p style="padding-left: 55px; font-size: 15px; color:dimgrey">Your search returned {{$programme_collection->total()}} result{{$programme_collection->total()>1?"s":""}}</p>
                    @endif

                    @foreach($programme_collection as $val)
                    <article class="blogPost" style="padding:5px !important; margin: 5px !important;">
                        <h1><a href="{{route("programme_details",base64_encode($val->programme_id))}}">{!! ucwords($val->degree_short_name.' , '.$val->name) !!} {!! $val->university_id?" <span style='text-transform:uppercase; font-size:19px;'>($val->university)</span>":"" !!}</a></h1>
                        <!-- postActionsInfo -->
                        <ul class="list-unstyled postActionsInfo">
                            <span class="label label-danger" style="padding:5px"><i class="fa fa-user"></i> {!! ucfirst($val->program_type_name) !!}</span>
                            &nbsp;&nbsp;<span class="label label-default" style="padding:5px"><i class="fa fa-graduation-cap"></i> {!! ucfirst($val->faculty_name) !!}</span>
                            &nbsp;&nbsp;<span class="label label-default" style="padding:5px"><i class="fa fa-anchor"></i> {!! ucfirst($val->department_name) !!}</span>
                        </ul>
                        <div>
                        <a href="{{route("programme_details",base64_encode($val->programme_id))}}" class="btn btn-default text-uppercase">Read More</a>
                        </div>
                    </article>
                    @endforeach
                    <!-- programmes -->

                    {{--<div class="pull-right">
                        {{$programme_collection->links()}}
                    </div>--}}

                    <nav aria-label="Page navigation">
                        <!-- pagination -->
                        {{$programme_collection->links()}}
                    </nav>

                </section>
            </div>
        </div>
@endsection


@section('additional_js')
    <script>
        $('body').on('change','select#faculty_id',(function(e)
        {
            var fac_id=$.trim($(this).val());
            if(fac_id!=""){
                $.ajax(
                    {
                        type:"POST",
                        data:{id:fac_id,
                            _token:$("input[name='_token']").val()
                        },
                        url:"{{route('get_departments_for_filter')}}",
                        beforeSend:function()
                        {},
                        success: function(r)
                        {
                            if(r!="")
                            {
                                $('select#department_id').html(r);
                            }

                        }
                    }
                );
            }

        }));

        $('body').on('click','button.submit',(function(e)
        {
            e.preventDefault();
            var program_type_id=$.trim($("select#programme_type_id").val());
            var fac_id=$.trim($("select#faculty_id").val());
            var dept_id=$.trim($("select#department_id").val());
            if(program_type_id || fac_id || dept_id){
                $("form#search").submit()
            }else{
                vex.dialog.alert({
                    message: 'You must select at least one search criteria'
                });
            }

        }));
    </script>
@endsection
