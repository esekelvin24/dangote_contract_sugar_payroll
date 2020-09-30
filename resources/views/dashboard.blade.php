@extends('layouts.dash_layout')

@section('content')

    @if(Auth::user()->user_type==1)
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Portal Dashboard
                        </h6>
                        <div class="element-content">
                            <div class="row">
                                @if(isset($student_year) && $student_year>0)
                                <div class="col-sm-4 col-xxxl-3">
                                    <a class="element-box el-tablo" href="#">
                                        <div class="label">
                                            Current Level
                                        </div>
                                        <div class="value">
                                            @if($spill_year>1)
                                                {{$student_year*100}} Level  {{"Year ".$spill_year." Spill"}}
                                            @else
                                                {{$student_year*100}} Level
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                @endif
                                <div class="col-sm-4 col-xxxl-3">
                                    <a class="element-box el-tablo" href="{{route("payment_portal")}}">
                                        <div class="label">
                                            Pending Payments
                                        </div>
                                        <div class="value">
                                            N{{number_format($all_expected_payments-$all_actual_payments,0)}}
                                        </div>
                                    </a>
                                </div>
                                {{--<div class="col-sm-4 col-xxxl-3">
                                    <a class="element-box el-tablo" href="#">
                                        <div class="label">
                                            Gross Profit
                                        </div>
                                        <div class="value">
                                            $457
                                        </div>
                                        <div class="trending trending-down-basic">
                                            <span>12%</span><i class="os-icon os-icon-arrow-down"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-xxxl-3">
                                    <a class="element-box el-tablo" href="#">
                                        <div class="label">
                                            New Customers
                                        </div>
                                        <div class="value">
                                            125
                                        </div>
                                        <div class="trending trending-down-basic">
                                            <span>9%</span><i class="os-icon os-icon-arrow-down"></i>
                                        </div>
                                    </a>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="support-index">
                <div class="support-tickets">
                    <div class="support-tickets-header">
                        <div class="tickets-control">
                            <h5>
                                My Programme Applications (@if(isset($my_application_collection) && !$my_application_collection->isEmpty()){{$my_application_collection->count()}}@else{{"0"}}@endif)
                            </h5>
                        </div>
                    </div>
                    @if(isset($my_application_collection) && !$my_application_collection->isEmpty())
                        @foreach($my_application_collection as $val)
                            <div class="support-ticket ">
                                <div class="st-meta">
                                    <div class="badge
                               @if($val->action_1_status==1)
                                    {{"badge-primary-inverted"}}
                                    @elseif($val->action_1_status==2)
                                    {{"badge-success-inverted"}}
                                    @elseif($val->action_1_status==3)
                                    {{"badge-danger-inverted"}}
                                    @endif">
                                        Approval 1 (
                                        @if($val->action_1_status==1)
                                            {{"pending"}}
                                        @elseif($val->action_1_status==2)
                                            {{"approved"}}
                                        @elseif($val->action_1_status==3)
                                            {{"rejected"}}
                                        @endif
                                        )
                                    </div>
                                    <div class="badge
                                @if($val->action_2_status==1)
                                    {{"badge-primary-inverted"}}
                                    @elseif($val->action_2_status==2)
                                    {{"badge-success-inverted"}}
                                    @elseif($val->action_2_status==3)
                                    {{"badge-danger-inverted"}}
                                    @endif
                                            ">
                                        Approval 2 (
                                        @if($val->action_2_status==1)
                                            {{"pending"}}
                                        @elseif($val->action_2_status==2)
                                            {{"approved"}}
                                        @elseif($val->action_2_status==3)
                                            {{"rejected"}}
                                        @endif
                                        )
                                    </div>
                                    <div class="badge
                                @if($val->action_3_status==1)
                                    {{"badge-primary-inverted"}}
                                    @elseif($val->action_3_status==2)
                                    {{"badge-success-inverted"}}
                                    @elseif($val->action_3_status==3)
                                    {{"badge-danger-inverted"}}
                                    @endif">
                                        Approval 3 (
                                        @if($val->action_3_status==1)
                                            {{"pending"}}
                                        @elseif($val->action_3_status==2)
                                            {{"approved"}}
                                        @elseif($val->action_3_status==3)
                                            {{"rejected"}}
                                        @endif
                                        )
                                    </div>
                                </div>
                                <div class="st-body">
                                    <div class="ticket-content">
                                        <h6 class="ticket-title">
                                            {{$val->degree_short_name.','.$val->name}} {!! $val->programme_type_id==1?" <span class='badge badge-warning'>(".$val->university.")<span>":"" !!} (<span style="color:#00aa88">{{$val->entry_type==1?"Regular Entry":"Direct Entry"}}</span>)
                                        </h6>
                                        <div class="ticket-description">
                                            FACULTY : {{$val->faculty_name}} &nbsp;&nbsp;&nbsp; DEPARTMENT : {{$val->department_name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="st-foot">
                                    <span class="label">Session:</span><span class="value">{{$val->session_name}}</span>  <span class="label">Programme Type:</span><span class="value">{{$val->program_type_name}}</span> <span class="label">Duration:</span><span class="value badge badge-pill badge-warning">{{$val->duration}}</span>  <span class="label">Date Applied:</span><span class="value">{{date('d, F Y h:m A',strtotime($val->date_applied))}}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @elseif(Auth::user()->user_type==2 && (Auth::user()->rights_id==2 || Auth::user()->rights_id==1))
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Portal Dashboard
                        </h6>
                        <div class="element-content">
                            <div class="row">
                                <div class="col-sm-4 col-xxxl-3">
                                    <a class="element-box el-tablo" href="{{route('manage_payment_portal')}}">
                                        <div class="label">
                                            Total Payments this week
                                        </div>
                                        <div class="value">
                                            N {{number_format($weekly_payments,0)}}
                                        </div>
                                    </a>
                                </div>
                                {{--<div class="col-sm-4 col-xxxl-3">
                                    <a class="element-box el-tablo" href="#">
                                        <div class="label">
                                            Gross Profit
                                        </div>
                                        <div class="value">
                                            $457
                                        </div>
                                        <div class="trending trending-down-basic">
                                            <span>12%</span><i class="os-icon os-icon-arrow-down"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-xxxl-3">
                                    <a class="element-box el-tablo" href="#">
                                        <div class="label">
                                            New Customers
                                        </div>
                                        <div class="value">
                                            125
                                        </div>
                                        <div class="trending trending-down-basic">
                                            <span>9%</span><i class="os-icon os-icon-arrow-down"></i>
                                        </div>
                                    </a>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="support-index">
                <div class="">
                    <div class="support-tickets-header">
                        <div class="tickets-control">
                            <h5>
                                All Programme Applications (@if(isset($all_application_collection) && !$all_application_collection->isEmpty()){{$all_application_collection->count()}}@else{{"0"}}@endif)
                            </h5>
                        </div>
                    </div>
                    @if(isset($all_application_collection) && !$all_application_collection->isEmpty())
                        <div class="element-box">
                            <div class="table-responsive">
                                <style>
                                    .form-inline{
                                        display: block !important;
                                    }
                                    ul.pagination a {
                                        position: relative;
                                        display: block;
                                        padding: 0.5rem 0.75rem;
                                        margin-left: -1px;
                                        line-height: 1.25;
                                        color: #047bf8;
                                        background-color: #fff;
                                        border: 1px solid #dee2e6;
                                    }
                                </style>
                                <table id="dataTable" class="table table-striped" style="width: 100% !important; table-layout: fixed;">
                                    <thead>
                                    <tr>
                                        <th style="width:10px">S/N</th>
                                        <th>STATUS</th>
                                        <th>APPLICANT</th>
                                        <th>ENTRY TYPE</th>
                                        <th>PROGRAMME TYPE</th>
                                        <th>PROGRAMME</th>
                                        <th>APPLIED ON</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th style="width:10px">S/N</th>
                                        <th>STATUS</th>
                                        <th>APPLICANT</th>
                                        <th>ENTRY TYPE</th>
                                        <th>PROGRAMME TYPE</th>
                                        <th>PROGRAMME</th>
                                        <th>APPLIED ON</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($all_application_collection as $k=>$val)
                                        <tr data-id="{{$val->application_id}}" style="cursor: pointer">
                                            <td style="width:10px">{{$k+1}}</td>
                                            <td>
                                                <div class="status-pill @if($val->action_1_status==1){{"yellow"}}@elseif($val->action_1_status==2){{"green"}}@elseif($val->action_1_status==3){{"red"}}@endif" data-title="Approval 1 @if($val->action_1_status==1){{"pending"}}@elseif($val->action_1_status==2){{"completed"}}@elseif($val->action_1_status==3){{"rejected"}}@endif" data-toggle="tooltip" data-original-title="" title=""></div>
                                                <div class="status-pill @if($val->action_2_status==1){{"yellow"}}@elseif($val->action_2_status==2){{"green"}}@elseif($val->action_2_status==3){{"red"}}@endif" data-title="Approval 2 @if($val->action_2_status==1){{"pending"}}@elseif($val->action_2_status==2){{"completed"}}@elseif($val->action_2_status==3){{"rejected"}}@endif" data-toggle="tooltip" data-original-title="" title=""></div>
                                                <div class="status-pill @if($val->action_3_status==1){{"yellow"}}@elseif($val->action_3_status==2){{"green"}}@elseif($val->action_3_status==3){{"red"}}@endif" data-title="Approval 3 @if($val->action_3_status==1){{"pending"}}@elseif($val->action_3_status==2){{"completed"}}@elseif($val->action_3_status==3){{"rejected"}}@endif" data-toggle="tooltip" data-original-title="" title=""></div>
                                            </td>
                                            <td><strong>{{$val->firstname.' '.$val->lastname}}</strong></td>
                                            <td>{{$val->entry_type==1?"Regular":"Direct"}}</td>
                                            <td>{{$val->program_type_name}}</td>
                                            <td>{{$val->degree_short_name." , ".$val->name}}{!! $val->programme_type_id==1?" <span class='badge badge-warning'>(".$val->university.")<span>":"" !!}</td>
                                            <td>{{date('d-m-y h:m A',strtotime($val->date_applied))}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @elseif(Auth::user()->user_type==2 && Auth::user()->rights_id==4)
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Portal Dashboard
                        </h6>
                        <div class="element-content">
                            <div class="row">
                                <div class="col-sm-4 col-xxxl-3">
                                    <a class="element-box el-tablo" href="#">
                                        <div class="label">
                                            Total Payments this week
                                        </div>
                                        <div class="value">
                                            N 0.00
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="support-index">
                <div class="">
                    <div class="support-tickets-header">
                        <div class="tickets-control">
                            <h5>
                                All Programme Applications (@if(isset($hod_application_collection) && !$hod_application_collection->isEmpty()){{$hod_application_collection->count()}}@else{{"0"}}@endif)
                            </h5>
                        </div>
                    </div>
                    @if(isset($hod_application_collection) && !$hod_application_collection->isEmpty())
                        <div class="element-box">
                            <div class="table-responsive">
                                <style>
                                    .form-inline{
                                        display: block !important;
                                    }
                                    ul.pagination a {
                                        position: relative;
                                        display: block;
                                        padding: 0.5rem 0.75rem;
                                        margin-left: -1px;
                                        line-height: 1.25;
                                        color: #047bf8;
                                        background-color: #fff;
                                        border: 1px solid #dee2e6;
                                    }
                                </style>
                                <table id="dataTable" class="table table-striped" style="width: 100% !important; table-layout: fixed;">
                                    <thead>
                                    <tr>
                                        <th style="width:10px">S/N</th>
                                        <th>STATUS</th>
                                        <th>APPLICANT</th>
                                        <th>ENTRY TYPE</th>
                                        <th>PROGRAMME TYPE</th>
                                        <th>PROGRAMME</th>
                                        <th>APPLIED ON</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th style="width:10px">S/N</th>
                                        <th>STATUS</th>
                                        <th>APPLICANT</th>
                                        <th>ENTRY TYPE</th>
                                        <th>PROGRAMME TYPE</th>
                                        <th>PROGRAMME</th>
                                        <th>APPLIED ON</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($hod_application_collection as $k=>$val)
                                        <tr data-id="{{$val->application_id}}" style="cursor: pointer">
                                            <td style="width:10px">{{$k+1}}</td>
                                            <td>
                                                <div class="status-pill @if($val->action_1_status==1){{"yellow"}}@elseif($val->action_1_status==2){{"green"}}@elseif($val->action_1_status==3){{"red"}}@endif" data-title="Approval 1 @if($val->action_1_status==1){{"pending"}}@elseif($val->action_1_status==2){{"completed"}}@elseif($val->action_1_status==3){{"rejected"}}@endif" data-toggle="tooltip" data-original-title="" title=""></div>
                                                <div class="status-pill @if($val->action_2_status==1){{"yellow"}}@elseif($val->action_2_status==2){{"green"}}@elseif($val->action_2_status==3){{"red"}}@endif" data-title="Approval 2 @if($val->action_2_status==1){{"pending"}}@elseif($val->action_2_status==2){{"completed"}}@elseif($val->action_2_status==3){{"rejected"}}@endif" data-toggle="tooltip" data-original-title="" title=""></div>
                                                <div class="status-pill @if($val->action_3_status==1){{"yellow"}}@elseif($val->action_3_status==2){{"green"}}@elseif($val->action_3_status==3){{"red"}}@endif" data-title="Approval 3 @if($val->action_3_status==1){{"pending"}}@elseif($val->action_3_status==2){{"completed"}}@elseif($val->action_3_status==3){{"rejected"}}@endif" data-toggle="tooltip" data-original-title="" title=""></div>
                                            </td>
                                            <td><strong>{{$val->firstname.' '.$val->lastname}}</strong></td>
                                            <td>{{$val->entry_type==1?"Regular":"Direct"}}</td>
                                            <td>{{$val->program_type_name}}</td>
                                            <td>{{$val->degree_short_name." , ".$val->name}}{!! $val->programme_type_id==1?" <span class='badge badge-warning'>(".$val->university.")<span>":"" !!}</td>
                                            <td>{{date('d-m-y h:m A',strtotime($val->date_applied))}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @elseif(Auth::user()->user_type==2 && Auth::user()->rights_id==5)
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Portal Dashboard
                        </h6>
                        <div class="element-content">
                            <div class="row">
                                <div class="col-sm-4 col-xxxl-3">
                                    <a class="element-box el-tablo" href="#">
                                        <div class="label">
                                            Total Payments this week
                                        </div>
                                        <div class="value">
                                            N 0.00
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="support-index">
                <div class="">
                    <div class="support-tickets-header">
                        <div class="tickets-control">
                            <h5>
                                All Programme Applications (@if(isset($dean_application_collection) && !$dean_application_collection->isEmpty()){{$dean_application_collection->count()}}@else{{"0"}}@endif)
                            </h5>
                        </div>
                    </div>
                    @if(isset($dean_application_collection) && !$dean_application_collection->isEmpty())
                        <div class="element-box">
                            <div class="table-responsive">
                                <style>
                                    .form-inline{
                                        display: block !important;
                                    }
                                    ul.pagination a {
                                        position: relative;
                                        display: block;
                                        padding: 0.5rem 0.75rem;
                                        margin-left: -1px;
                                        line-height: 1.25;
                                        color: #047bf8;
                                        background-color: #fff;
                                        border: 1px solid #dee2e6;
                                    }
                                </style>
                                <table id="dataTable" class="table table-striped" style="width: 100% !important; table-layout: fixed;">
                                    <thead>
                                    <tr>
                                        <th style="width:10px">S/N</th>
                                        <th>STATUS</th>
                                        <th>APPLICANT</th>
                                        <th>ENTRY TYPE</th>
                                        <th>PROGRAMME TYPE</th>
                                        <th>PROGRAMME</th>
                                        <th>APPLIED ON</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th style="width:10px">S/N</th>
                                        <th>STATUS</th>
                                        <th>APPLICANT</th>
                                        <th>ENTRY TYPE</th>
                                        <th>PROGRAMME TYPE</th>
                                        <th>PROGRAMME</th>
                                        <th>APPLIED ON</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($dean_application_collection as $k=>$val)
                                        <tr data-id="{{$val->application_id}}" style="cursor: pointer">
                                            <td style="width:10px">{{$k+1}}</td>
                                            <td>
                                                <div class="status-pill @if($val->action_1_status==1){{"yellow"}}@elseif($val->action_1_status==2){{"green"}}@elseif($val->action_1_status==3){{"red"}}@endif" data-title="Approval 1 @if($val->action_1_status==1){{"pending"}}@elseif($val->action_1_status==2){{"completed"}}@elseif($val->action_1_status==3){{"rejected"}}@endif" data-toggle="tooltip" data-original-title="" title=""></div>
                                                <div class="status-pill @if($val->action_2_status==1){{"yellow"}}@elseif($val->action_2_status==2){{"green"}}@elseif($val->action_2_status==3){{"red"}}@endif" data-title="Approval 2 @if($val->action_2_status==1){{"pending"}}@elseif($val->action_2_status==2){{"completed"}}@elseif($val->action_2_status==3){{"rejected"}}@endif" data-toggle="tooltip" data-original-title="" title=""></div>
                                                <div class="status-pill @if($val->action_3_status==1){{"yellow"}}@elseif($val->action_3_status==2){{"green"}}@elseif($val->action_3_status==3){{"red"}}@endif" data-title="Approval 3 @if($val->action_3_status==1){{"pending"}}@elseif($val->action_3_status==2){{"completed"}}@elseif($val->action_3_status==3){{"rejected"}}@endif" data-toggle="tooltip" data-original-title="" title=""></div>
                                            </td>
                                            <td><strong>{{$val->firstname.' '.$val->lastname}}</strong></td>
                                            <td>{{$val->entry_type==1?"Regular":"Direct"}}</td>
                                            <td>{{$val->program_type_name}}</td>
                                            <td>{{$val->degree_short_name." , ".$val->name}}{!! $val->programme_type_id==1?" <span class='badge badge-warning'>(".$val->university.")<span>":"" !!}</td>
                                            <td>{{date('d-m-y h:m A',strtotime($val->date_applied))}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Portal Dashboard
                        </h6>
                        <div class="element-content">
                            <div class="row">
                                Welcome to the portal landing page. Kindly use the menu on your left to maximize your ePortal landing page.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    @endif

    @if(isset($offer_letter_set) && isset($acceptance_fee_paid) && $offer_letter_set==false && $acceptance_fee_paid )
        <!-- Modal Change First Password -->
        <div class="modal fade horizontal upload_offer_letter"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" >
                <div class="modal-content">
                    <button onclick="document.getElementById('logout-form').submit();" class="btn-danger"><i class="fa fa-sign-out"></i>LOGOUT</button>
                    <div class="modal-header" style="flex-direction: column !important; align-items: center !important; ">
                        <img src="{{asset('_img/offer_letter.gif')}}" /><br/>
                        <h3 class="modal-title text-primary" id="myModalLabel" style="text-align: center">Congratulations!</h3><br/>
                        <p style="text-align: center">Your have successfully paid your acceptance fee!<br/>
                           You must however upload your completed acceptance letter to proceed.
                        </p>
                    </div>

                    <div class="modal-body">
                        <form id="upload_offer" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            Completed Offer Letter <span class="symbol required"></span>
                                        </label>
                                        <input autocomplete="off" name="completed_offer_letter" class="form-control" type="file">
                                        <span class="text-danger error-message"></span>
                                    </div>


                                    <button type="submit" class="btn btn-o btn-primary save_offer_letter">
                                        Upload Document
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(isset($acceptance_fee_paid) && !$acceptance_fee_paid )
        <!-- Modal Change First Password -->
        <div class="modal fade horizontal pay_acceptance_fee"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" >
                <div class="modal-content">
                    <button onclick="document.getElementById('logout-form').submit();" class="btn-danger"><i class="fa fa-sign-out"></i>LOGOUT</button>
                    <div class="modal-header" style="flex-direction: column !important; align-items: center !important; ">
                        <img style="width:90px; height:90px" src="{{asset('_img/acceptance.png')}}" /><br/>
                        {{-- <h3 class="modal-title text-primary" id="myModalLabel" style="text-align: center">Congratulations!</h3><br/> --}}
                        <p style="text-align: center; font-size:17px">
                           You are required to pay your acceptance fee
                        </p>
                    </div>

                    <div class="modal-body">
                            <div class="row">        
                            <button data-href="{{route("pay_fees",base64_encode(2))}}" class="btn btn-o btn-lg btn-success pay_acceptance_fee_btn" style="margin: 0 auto;">
                                        Pay  N{{number_format($acceptance_fee,2)}} Acceptance Fee
                            </button>   
                            </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(isset($psw))
        <!-- Modal Change First Password -->
        <div class="modal fade horizontal edit_area"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" >
                <div class="modal-content">
                    <button onclick="document.getElementById('logout-form').submit();" class="btn-danger"><i class="fa fa-sign-out"></i>LOGOUT</button>
                    <div class="modal-header" style="flex-direction: column !important; align-items: center !important; ">
                        <img src="{{asset('_img/p1.gif')}}" /><br/>
                        <h3 class="modal-title text-primary" id="myModalLabel" style="text-align: center">Compulsory Password Change!</h3><br/>
                        <p style="text-align: justify">You are using the default password assigned during staff creation. Kindly enter your new password.<br/>
                            Ensure that your passwords are unique and are at least 6 characters long.

                        </p>
                    </div>

                    <div class="modal-body">
                        <form id="new_pass" action="" method="post">
                            {{  csrf_field()  }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            Password <span class="symbol required"></span>
                                        </label>
                                        <input name="password1" class="form-control" placeholder="Enter Password" type="password">
                                        <span class="text-danger error-message"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Repeat Password <span class="symbol required"></span>
                                        </label>
                                        <input name="password2" placeholder="Confirm Password" class="form-control check" type="password">
                                        <span class="text-danger error-message"></span>
                                    </div>


                                    <button type="submit" class="btn btn-o btn-primary save">
                                        Save Changes
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- / Modal Change First Password -->
    <!-- General Modal -->
    <div class="modal fade general_modal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- //End General Modal -->
@endsection

@section('additional_js')
    @if(isset($acceptance_fee_paid) && !$acceptance_fee_paid) 
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script id="paystack"></script>
    @endif
    <script>
        jQuery(document).ready(function() {
            vex.defaultOptions.className = 'vex-theme-flat-attack';

            @if(isset($_GET['acceptance_success']))
            vex.dialog.alert({
                        unsafeMessage: `<div style="text-align: center"><img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Acceptance Fee Successfully Paid</div>`,
                    });
                    setTimeout(function(){vex.closeAll()},2000);
            @endif

            $('body').on('click','button[data-action]',function(e)
            {
                e.preventDefault();
                var no=$(this).data("id");
                var action=$(this).data("action");
                var the_route="{{route('application_level_approval')}}";
                if(action==2) {
                    vex.dialog.confirm({
                        unsafeMessage: `Irreversible process detected! <br/>Are you want to ${action == 2 ? 'APPROVE' : 'REJECT'} this application?`,
                        callback: function (value) {
                            if (value) {
                                $.ajax(
                                    {
                                        type: "GET",
                                        url: `${the_route}/${no}/${action}`,
                                        beforeSend: function () {
                                            $('div.modal-content').block();
                                        },
                                        success: function (r) {
                                            $('div.modal-content').unblock();
                                            vex.dialog.alert({
                                                unsafeMessage: `
                                  <div style="text-align: center">
                                    <img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Application has been approved!
                                    </div>
                                    `,
                                                className:'vex-theme-default'
                                            });

                                            setTimeout(function(){
                                                window.location.reload()
                                            },3000);
                                        }
                                    }
                                );
                            }
                        }
                    })
                }
                else{
                    vex.dialog.prompt({
                        message: 'Kindly enter specific reason for rejecting student:',
                        className:'vex-theme-flat-attack',
                        placeholder: 'enter reason',
                        callback: function (value) {
                            if (value) {
                                $.ajax(
                                    {
                                        type: "GET",
                                        data:{
                                            reason: value
                                        },
                                        url: `${the_route}/${no}/${action}`,
                                        beforeSend: function () {
                                            $('div.modal-content').block();
                                        },
                                        success: function (r) {
                                            $('div.modal-content').unblock();
                                            vex.dialog.alert({
                                                unsafeMessage: `
                                <div style="text-align: center">
                                    <img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Application has been rejected and applicant has been notified!
                                </div>
                                    `,
                                                className:'vex-theme-default'
                                            });

                                            setTimeout(function(){
                                                window.location.reload()
                                            },3000);
                                        }
                                    }
                                );
                            }
                            else{
                                vex.dialog.alert({
                                    unsafeMessage: `
                                    <div style="text-align: center">
                                    <img src="_img/barred.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    You must specify a reason for rejecting application
                                    </div>
                                    `,
                                    className:'vex-theme-default'
                                })
                            }
                        }
                    });
                }
            });

            $('body').on('click','button.save_offer_letter',function(e){
                e.preventDefault();
                var allowExt=['jpg','jpeg','pdf','png'];
                var filename= $("input[name='completed_offer_letter']").val();
                if(filename==""){
                    vex.dialog.alert({
                        unsafeMessage: `<div style="text-align: center"><img src="_img/barred.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    File is required</div>`,
                    });
                }
                else if(!allowExt.includes(filename.split('.')[1])){
                    vex.dialog.alert({
                        unsafeMessage: `<div style="text-align: center"><img src="_img/barred.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    The file doesn't meet file upload type requirements. Only pdfs and image formats are allowed</div>`,
                    });
                }
                else{
                    var formData = new FormData($('form#upload_offer')[0]);
                    $.ajax(
                        {
                            type:"POST",
                            data:formData,
                            url:"{{route('submit_offer_letter')}}",
                            cache:false,
                            contentType:false,
                            processData:false,
                            beforeSend:function()
                            {
                                $('form#upload_offer').block({ message: null });
                            },
                            error: function(r)
                            {
                                $('form#upload_offer').unblock();
                                vex.dialog.alert({
                                    unsafeMessage: `<div style="text-align: center"><img src="_img/barred.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    There were errors, please try again</div>`,
                                });
                            },
                            success: function(r)
                            {
                                $('form#upload_offer').unblock();
                                vex.dialog.alert({
                                    unsafeMessage: `<div style="text-align: center"><img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Uploaded successfully</div>`,
                                });
                                setTimeout(function(){
                                    vex.closeAll();
                                    $(".upload_offer_letter").modal('hide');
                                },2000)
                            }

                        }
                    );
                }
            })

            $('body').on('click','tr[data-id]',function(e)
            {
                e.preventDefault();
                var no=$(this).data("id");
                var the_route="{{route('application_details')}}";
                $.ajax(
                    {
                        type:"GET",
                        url:`${the_route}/${no}`,
                        beforeSend:function()
                        {
                            $('table').block();
                        },
                        success: function(r)
                        {
                            $('table').unblock();
                            $('div.modal-body').html(r);
                            $('.general_modal').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
                        }
                    }
                );
            });

            if ($('#dataTable').length) {
                $('#dataTable').DataTable({
                    "scrollX": true
                });
            }
            //SOLVE BOOTSTRAP INPUT ISSUE
            $('.general_modal').on('shown.bs.modal', function() {
                $(document).off('focusin.modal');
            });

            @if(isset($offer_letter_set) && $offer_letter_set==false)
            $(".upload_offer_letter").modal
            (
                {
                    backdrop:'static',
                    keyboard:false
                }
            );
            @endif

            @if(isset($acceptance_fee_paid) && !$acceptance_fee_paid) 
            $(".pay_acceptance_fee").modal
            (
                {
                    backdrop:'static',
                    keyboard:false
                }
            );

            $('body').on('click','button.pay_acceptance_fee_btn',function(e){
                e.preventDefault();
                var route=$(this).data("href");
                $.ajax(
                            {
                                type:"GET",
                                cache:false,
                                contentType:false,
                                processData:false,
                                url:route,
                                beforeSend:function()
                                {
                                    $('body').block();
                                },
                                error: function(r)
                                {
                                    $('body').unblock(); 
                                },
                                success: function(r)
                                {
                                    $('body').unblock();
                                    $('.pay_acceptance_fee').modal('hide');
                                    $('#paystack').html(r);
                                    payWithPaystack();
                                }
                            }

                        );
            });
            @endif

            @if(isset($psw))
            $(".edit_area").modal
            (
                {
                    backdrop:'static',
                    keyboard:false
                }
            );

            $('form#new_pass').on('blur','input',(function(e)
            {
                var $this=$(this);
                if($.trim($this.val())!="")
                {
                    //validate
                    $this.next('span.error-message').html('');
                    $this.closest('div.form-group').removeClass('has-error');
                    $this.closest('div.form-group').addClass('has-success');
                }

            }));

            $('button.save').click(function(e){
                    e.preventDefault();
                    var formData = new FormData($('form#new_pass')[0]);
                    var password1=$.trim($("input[name='password1']").val());
                    var password2=$.trim($("input[name='password2']").val());
                    if(password1=="" || password2=="")
                    {
                        swal("Error","All fields are compulsory","error");
                    }

                    else if(password1==password2)
                    {

                        $.ajax(
                            {
                                type:"POST",
                                data:formData,
                                cache:false,
                                contentType:false,
                                processData:false,
                                url:"{{route('first_changepsw')}}",
                                beforeSend:function()
                                {
                                    $('form#new_pass').block();
                                },
                                error: function(r)
                                {
                                    $('form#new_pass').unblock();
                                    const errors = r.responseJSON.errors;
                                    //clear any previous errors
                                    $('span.error-message').html('');
                                    $('div.has-error').removeClass('has-error');
                                    $.each(errors,function(index,value)
                                        {
                                            $('input[name="'+index+'"]').next('span.error-message').html(''+value);
                                            $('input[name"'+index+'"]').closest('div.form-group').addClass('has-error');
                                        }
                                    );
                                },
                                success: function(r)
                                {
                                    $('.edit_area').modal('hide');
                                    $('form#new_pass').unblock();
                                    swal("Awesome!","New password successfully set!","success");
                                    $('span.error-message').html('');
                                    $('div.has-error').removeClass('has-error');
                                    $('div.has-success').removeClass('has-success');
                                    //clear all items
                                    $('form#new_pass')[0].reset();


                                }
                            }

                        );
                    }else
                    {
                        swal("Error","Passwords must match","error");
                    }

                }
            );
            @endif
        });
    </script>
@endsection