@extends('../layouts.frontend')

@section('title-name')
Fee Breakdown :: IAUE University Distance Programme
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
        <header class="heading-banner text-midnightblue bgCover" style="padding:5px;background-image: url({{asset("_img/fee.jpeg")}}); background-size: cover; background-repeat: no-repeat">
            <div class="container holder">
                <div class="align">
                    <h1 style="color: whitesmoke">IAUE Fee Breakdown</h1>
                </div>
            </div>
        </header>
        <!-- breadcrumb nav -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{route("home")}}">Home</a></li>
                    <li class="active">Fee Breakdown</li>
                </ol>
            </div>
        </nav>

        <div id="two-columns" class="container">
                   @if(!isset($no_session))
                    <div class="row">
                        <blockquote>
                            <h1><strong>{{$programme_type_collection[0]->program_type_name}}</strong></h1>
                        </blockquote>
                        @foreach($university_collection as $uni)
                        <h1>{{$uni->university}}</h1>
                        <h2>UNDERGRADUATE FEES</h2>
                            <h3><img src="{{asset("_img/new.png")}}" style="width:40px; height: 40px" />New Students</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead style="background-color: lightgoldenrodyellow; color: midnightblue">
                                    <th style="width:10px !important;">S/N</th>
                                    <th style="width:50%">Fee Name</th>
                                    <th style="width:50%">Amount (N)</th>
                                    </thead>
                                    <tbody>
                                    <?php $a=0; $sum=0; ?>
                                    @foreach($fee_collection as $val)

                                            @if($val->program_type_id==1 && $val->fee_type==1 && $val->degree_class==1 && $val->fee_class==1 && $val->university_id==$uni->university_id)
                                            <?php
                                            $a++;
                                            $sum += $val->fee_amount;
                                            ?>
                                            <tr>
                                                <td style="width:10px !important;">{{$a}}</td>
                                                <td style="width:50%">{{$val->fee_name}}</td>
                                                <td style="width:50%">{{number_format($val->fee_amount,2)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr style="font-weight: bold">
                                        <td style="width:10px !important;"></td>
                                        <td style="width:50%">TOTAL</td>
                                        <td style="width:50%">{{number_format($sum,2)}}</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>

                            <h3><img src="{{asset("_img/returning.png")}}" style="width:40px; height: 40px" />Returning Students</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead style="background-color: lightgoldenrodyellow; color: midnightblue">
                                    <th style="width:10px !important;">S/N</th>
                                    <th style="width:50%">Fee Name</th>
                                    <th style="width:50%">Amount (N)</th>
                                    </thead>
                                    <tbody>
                                    <?php $a=0; $sum=0; ?>
                                    @foreach($fee_collection as $val)
                                        @if($val->program_type_id==1 && $val->fee_type==1 && $val->degree_class==1 && $val->fee_class==2 && $val->university_id==$uni->university_id)
                                            <?php
                                            $a++;
                                            $sum += $val->fee_amount;
                                            ?>
                                            <tr>
                                                <td style="width:10px !important;">{{$a}}</td>
                                                <td style="width:50%">{{$val->fee_name}}</td>
                                                <td style="width:50%">{{number_format($val->fee_amount,2)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr style="font-weight: bold">
                                        <td style="width:10px !important;"></td>
                                        <td style="width:50%">TOTAL</td>
                                        <td style="width:50%">{{number_format($sum,2)}}</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>

                            <h2>POSTGRADUATE FEES</h2>

                            <h3><img src="{{asset("_img/new.png")}}" style="width:40px; height: 40px" />New Students</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead style="background-color: lightgoldenrodyellow; color: midnightblue">
                                    <th style="width:10px !important;">S/N</th>
                                    <th style="width:50%">Fee Name</th>
                                    <th style="width:50%">Amount (N)</th>
                                    </thead>
                                    <tbody>
                                    <?php $a=0; $sum=0; ?>
                                    @foreach($fee_collection as $val)
                                        @if($val->program_type_id==1 && $val->fee_type==1 && $val->degree_class==2 && $val->fee_class==1 && $val->university_id==$uni->university_id)
                                            <?php
                                            $a++;
                                            $sum += $val->fee_amount;
                                            ?>
                                            <tr>
                                                <td style="width:10px !important;">{{$a}}</td>
                                                <td style="width:50%">{{$val->fee_name}}</td>
                                                <td style="width:50%">{{number_format($val->fee_amount,2)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr style="font-weight: bold">
                                        <td style="width:10px !important;"></td>
                                        <td style="width:50%">TOTAL</td>
                                        <td style="width:50%">{{number_format($sum,2)}}</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>

                            <h3><img src="{{asset("_img/returning.png")}}" style="width:40px; height: 40px" />Returning Students</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead style="background-color: lightgoldenrodyellow; color: midnightblue">
                                    <th style="width:10px !important;">S/N</th>
                                    <th style="width:50%">Fee Name</th>
                                    <th style="width:50%">Amount (N)</th>
                                    </thead>
                                    <tbody>
                                    <?php $a=0; $sum=0; ?>
                                    @foreach($fee_collection as $val)
                                        @if($val->program_type_id==1 && $val->fee_type==1 && $val->degree_class==2 && $val->fee_class==2 && $val->university_id==$uni->university_id)
                                            <?php
                                            $a++;
                                            $sum += $val->fee_amount;
                                            ?>
                                            <tr>
                                                <td style="width:10px !important;">{{$a}}</td>
                                                <td style="width:50%">{{$val->fee_name}}</td>
                                                <td style="width:50%">{{number_format($val->fee_amount,2)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr style="font-weight: bold">
                                        <td style="width:10px !important;"></td>
                                        <td style="width:50%">TOTAL</td>
                                        <td style="width:50%">{{number_format($sum,2)}}</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <blockquote>
                            <h1><strong>{{$programme_type_collection[1]->program_type_name}}</strong></h1>
                        </blockquote>
                        <h2>UNDERGRADUATE FEES</h2>
                        <h3><img src="{{asset("_img/new.png")}}" style="width:40px; height: 40px" />New Students</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color: lightgoldenrodyellow; color: midnightblue">
                                <th style="width:10px !important;">S/N</th>
                                <th style="width:50%">Fee Name</th>
                                <th style="width:50%">Amount (N)</th>
                                </thead>
                                <tbody>
                                <?php $a=0; $sum=0; ?>
                                @foreach($fee_collection as $val)
                                    @if($val->program_type_id==2 && $val->fee_type==1 && $val->degree_class==1 && $val->fee_class==1)
                                        <?php
                                        $a++;
                                        $sum += $val->fee_amount;
                                        ?>
                                        <tr>
                                            <td style="width:10px !important;">{{$a}}</td>
                                            <td style="width:50%">{{$val->fee_name}}</td>
                                            <td style="width:50%">{{number_format($val->fee_amount,2)}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="font-weight: bold">
                                    <td style="width:10px !important;"></td>
                                    <td style="width:50%">TOTAL</td>
                                    <td style="width:50%">{{number_format($sum,2)}}</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>

                        <h3><img src="{{asset("_img/returning.png")}}" style="width:40px; height: 40px" />Returning Students</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color: lightgoldenrodyellow; color: midnightblue">
                                <th style="width:10px !important;">S/N</th>
                                <th style="width:50%">Fee Name</th>
                                <th style="width:50%">Amount (N)</th>
                                </thead>
                                <tbody>
                                <?php $a=0; $sum=0; ?>
                                @foreach($fee_collection as $val)
                                    @if($val->program_type_id==2 && $val->fee_type==1 && $val->degree_class==1 && $val->fee_class==2)
                                        <?php
                                        $a++;
                                        $sum += $val->fee_amount;
                                        ?>
                                        <tr>
                                            <td style="width:10px !important;">{{$a}}</td>
                                            <td style="width:50%">{{$val->fee_name}}</td>
                                            <td style="width:50%">{{number_format($val->fee_amount,2)}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="font-weight: bold">
                                    <td style="width:10px !important;"></td>
                                    <td style="width:50%">TOTAL</td>
                                    <td style="width:50%">{{number_format($sum,2)}}</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>

                        <h2>POSTGRADUATE FEES</h2>

                        <h3><img src="{{asset("_img/new.png")}}" style="width:40px; height: 40px" />New Students</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color: lightgoldenrodyellow; color: midnightblue">
                                <th style="width:10px !important;">S/N</th>
                                <th style="width:50%">Fee Name</th>
                                <th style="width:50%">Amount (N)</th>
                                </thead>
                                <tbody>
                                <?php $a=0; $sum=0; ?>
                                @foreach($fee_collection as $val)
                                    @if($val->program_type_id==2 && $val->fee_type==1 && $val->degree_class==2 && $val->fee_class==1)
                                        <?php
                                        $a++;
                                        $sum += $val->fee_amount;
                                        ?>
                                        <tr>
                                            <td style="width:10px !important;">{{$a}}</td>
                                            <td style="width:50%">{{$val->fee_name}}</td>
                                            <td style="width:50%">{{number_format($val->fee_amount,2)}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="font-weight: bold">
                                    <td style="width:10px !important;"></td>
                                    <td style="width:50%">TOTAL</td>
                                    <td style="width:50%">{{number_format($sum,2)}}</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>

                        <h3><img src="{{asset("_img/returning.png")}}" style="width:40px; height: 40px" />Returning Students</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color: lightgoldenrodyellow; color: midnightblue">
                                <th style="width:10px !important;">S/N</th>
                                <th style="width:50%">Fee Name</th>
                                <th style="width:50%">Amount (N)</th>
                                </thead>
                                <tbody>
                                <?php $a=0; $sum=0; ?>
                                @foreach($fee_collection as $val)
                                    @if($val->program_type_id==2 && $val->fee_type==1 && $val->degree_class==2 && $val->fee_class==2)
                                        <?php
                                        $a++;
                                        $sum += $val->fee_amount;
                                        ?>
                                        <tr>
                                            <td style="width:10px !important;">{{$a}}</td>
                                            <td style="width:50%">{{$val->fee_name}}</td>
                                            <td style="width:50%">{{number_format($val->fee_amount,2)}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="font-weight: bold">
                                    <td style="width:10px !important;"></td>
                                    <td style="width:50%">TOTAL</td>
                                    <td style="width:50%">{{number_format($sum,2)}}</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                   @else
                    <div class="row" style="text-align: center">
                        <img style="width:100px; height:100px" src="{{asset("_img/barred.png")}}" alt=""><br/>
                        <h3>No active session specified!</h3>
                    </div>
                   @endif
        </div>


@endsection


@section('additional_js')
    <script>
    </script>
@endsection
