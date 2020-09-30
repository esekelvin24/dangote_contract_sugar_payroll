@extends('layouts.app2')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">
        @if(($userDetails->id == Auth::user()->id))
            My Profile
        @else
            {{ $userDetails->name}}'s Profile
        @endif
        </h3>
        
    </div>
    <div class="col-md-7 col-4 align-self-center">
       
        <ol class="breadcrumb btn waves-effect waves-light pull-right hidden-sm-down">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- Column -->
                        <div class="card">
                            <!-- <div class="card-block bg-info">
                                <h4 class="text-white card-title">&nbsp;</h4>
                                <h6 class="card-subtitle text-white m-b-0 op-5">&nbsp;</h6>
                            </div> -->
                            <img class="card-img-top" src="{{ asset("/material-lite-master/assets/images/background/profile-bg.jpg") }}" alt="Card image cap">
                            <div class="card-block little-profile text-center">
                                <div class="pro-img"><img src="{{ asset("/material-lite-master/assets/images/users/1.png")}}" alt="user" /></div>
                                <h3 class="m-b-0">{{ $userDetails->name}}</h3>
                                <p>{{-- {{ $userDetails->department->name }} --}}</p>
                                <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">{{ $userDetails->designation }}</a>
                                <div class="row text-center m-t-20">
                                    <div class="col-lg-12 col-md-12 m-t-20">
                                        <h3 class="m-b-0 font-light">{{ $userDetails->sap}}</h3><small>SAP No</small></div>
                                  <!--   <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">23,469</h3><small>Followers</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">6035</h3><small>Following</small></div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="card">
                            <div class="card-block bg-info">
                                <h4 class="text-white card-title">Emergency Contacts</h4>
                                <!-- <h6 class="card-subtitle text-white m-b-0 op-5">Your Emergency contacts here</h6> -->
                            </div>
                            <div class="card-block">
                                <div class="message-box contact-box">
                                    @if(($userDetails->id == Auth::user()->id))
                                    <h2 class="add-ct-btn"><button type="button" data-toggle="modal" data-target="#emergencyContactForm" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></h2>
                                    @endif
                                    <div class="message-widget contact-widget">
                                    @if($emergency_contacts_count > 0)
                                        @foreach($emergency_contacts as $sn => $emergency_contact)
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="mail-contnet">
                                                <span class="close"><button type="button" onclick="event.preventDefault(); document.getElementById('delete_emergency_contact').submit();"><i class="fa fa-trash-o"></i></button>
                                                    <form id="delete_emergency_contact" action="{{ url('emergency_contact/delete') }}" method="post" style="display: none;">
                                                     {{ csrf_field() }}
                                                     <input type="hidden" name="delete_contact" value="{{ $emergency_contact->id }}">
                                                    </form>
                                                </span>
                                                <h5>{{ $emergency_contact->contact_name }}</h5> 
                                                <span class="mail-desc">{{ $emergency_contact->relationship }} </span>
                                                <span class="mail-desc">{{ $emergency_contact->phone }}</span>

                                            </div>
                                        </a>
                                        <!-- Message -->
                                        @endforeach
                                     @else
                                         <div class="mail-contnet">
                                            <h5>No Emergency Contacts</h5> 
                                        </div>   
                                     @endif   
                                    </div>
                                </div>
                            </div>

                            <!-- Emergency Contact Form Modal start -->
                            <div class="modal fade" id="emergencyContactForm" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <!-- <h4 class="modal-title">Add Record</h4> -->
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{ url('emergency_contact') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                              <div class="form-group">
                                                <label for="contact_name" class="col-md-12">Contact Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="contact_name" class="form-control form-control-line" required="required">
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label for="contact_relationship" class="col-md-12">Contact Relationship</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="contact_relationship" class="form-control form-control-line" required="required">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="contact_number" class="col-md-12">Contact Number</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="contact_number" class="form-control form-control-line" required="required">
                                                </div>
                                            </div>
                                            </div>
                                            @if(($userDetails->id == Auth::user()->id))
                                                <button type="submit" class="btn btn-default">Add Contact</button>
                                            @endif
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Attendance Validation Modal End -->

                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist" id="myTab">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#spouse" role="tab">Spouse Details</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#passport" role="tab">Passport & Cerpac</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bank" role="tab">Bank Info</a> </li>
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#mydetails" role="tab">My Details</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#attachments" role="tab">Attachments</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane" id="spouse" role="tabpanel">
                                    <div class="card-block">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ url('spouse_details') }}" method="post" class="form-horizontal form-material">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="profile_owner_id" value="{{ $userDetails->id }}">
                                            <div class="form-group">
                                                <label class="col-md-12">Spouse Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="spouse_name" placeholder="Spouse Name" value="{{ $userDetails->spouse_name }}" class="form-control form-control-line" @yield('readonly')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="spouse_email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="Spouse Email" class="form-control form-control-line" name="spouse_email" id="spouse_email" value="{{ $userDetails->spouse_email }}" @yield('readonly')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Spouse Phone Number" class="form-control form-control-line" name="spouse_phone" id="spouse_phone" value="{{ $userDetails->spouse_phone }}" @yield('readonly')>
                                                </div>
                                            </div>
                                            
                                            @if(($userDetails->id == Auth::user()->id))
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Spouse Info</button>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="passport" role="tabpanel">
                                    <div class="card-block">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ url('passport_details') }}" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="profile_owner_id" value="{{ $userDetails->id }}">
                                            <div class="form-group">
                                                <label class="col-md-12">Passport No.</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Passport No." name="passport_no" value="{{ $userDetails->passport_no}}" class="form-control form-control-line" @yield('readonly')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="passport_expiry_date" class="col-md-12">Passport Expiry Date</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Passport Expiration Date" name="passport_expiry_date" value="{{ $userDetails->passport_expiry_date}}" class="form-control form-control-line datepicker" @yield('disabled')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Passport Scan</label>
                                                <div class="col-md-12">
                                                    <input type="file" placeholder="Upload Passport" name="upload_passport"  class="form-control form-control-line" @yield('disabled')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">CERPAC No.</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="CERPAC No." name="cerpac_no" value="{{ $userDetails->cerpac_no}}" class="form-control form-control-line" @yield('readonly')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cerpac_expiry_date" class="col-md-12">CERPAC Expiry Date</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Passport Expiration Date" name="cerpac_expiry_date" value="{{ $userDetails->cerpac_expiry_date}}" class="form-control form-control-line datepicker" @yield('disabled')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">CERPAC Scan</label>
                                                <div class="col-md-12">
                                                    <input type="file" placeholder="Upload CERPAC" name="upload_cerpac"  class="form-control form-control-line" @yield('disabled')>
                                                </div>
                                            </div>
                                            @if(($userDetails->id == Auth::user()->id))
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Passport & CERPAC</button>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bank" role="tabpanel">
                                    <div class="card-block">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ url('bank_details') }}" method="post" class="form-horizontal form-material">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="profile_owner_id" value="{{ $userDetails->id }}">
                                            <div class="form-group">
                                                <label class="col-md-12">Bank Name</label>
                                                <div class="col-md-12">
                                                    <select @yield('disabled') id="bank" class="form-control form-control-line" name="bank">
                                                        <option value="" disabled selected>Select Bank</option>
                                                        @foreach($banks as $id=>$bank)
                                                            <option @yield('disabled') value="{{$id}}" {{ ($userDetails->bank_id == $id ) ? 'selected' : '' }}>{{$bank}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="account_number" class="col-md-12">Account Number</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Bank Account Number" class="form-control form-control-line" name="account_number" id="account_number" value="{{ $userDetails->bank_account_number }}" @yield('readonly')>
                                                </div>
                                            </div>
                                            @if(($userDetails->id == Auth::user()->id))
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Bank Info</button>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane active" id="mydetails" role="tabpanel">
                                    <div class="card-block">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ url('my_details') }}" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="profile_owner_id" value="{{ $userDetails->id }}">
                                            <div class="form-group">
                                                <label for="sap" class="col-md-12">SAP/Staff No.</label>
                                                <div class="col-md-12">
                                                    <input type="text" readonly="true" placeholder="SAP/Staff Number" name="sap" class="form-control form-control-line" value="{{ $userDetails->sap }}" @yield('readonly')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Fullname" name="name" class="form-control form-control-line" value="{{ $userDetails->name }}" @yield('readonly')>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="country" class="col-md-12">Nationality</label>
                                                <div class="col-md-12">
                                                    <select @yield('disabled') id="bank" class="form-control form-control-line" name="country" @yield('readonly')>
                                                        <option value="" disabled selected>Select Nationality</option>
                                                        @foreach($nationalities as $id=>$nationality)
                                                            <option @yield('disabled') value="{{$id}}" {{ ($userDetails->country_id == $id ) ? 'selected' : '' }}>{{$nationality}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="Email" class="form-control form-control-line" name="email" id="email" value="{{ $userDetails->email }}" @yield('readonly')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Department</label>
                                                <div class="col-sm-12">
                                                    <select @yield('disabled') id="department" class="form-control form-control-line" name="department"  @yield('readonly')>
                                                        <option value="" disabled selected>Select Department</option>
                                                        @foreach($departments as $id=>$department)
                                                            <option  @yield('disabled') value="{{$id}}" {{ ($userDetails->department_id == $id ) ? 'selected' : '' }}>{{$department}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="designation" class="col-md-12">Designation</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Job Designation" name="designation" class="form-control form-control-line" value="{{ $userDetails->designation }}" @yield('readonly')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Phone Number" name="phone" class="form-control form-control-line" value="{{ $userDetails->phone }}" @yield('readonly')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="bloodgroup" class="col-md-12">Blood Group</label>
                                                <div class="col-md-12">
                                                    <select @yield('disabled') id="bloodgroup" class="form-control form-control-line" name="bloodgroup"  @yield('readonly')>
                                                        <option value="" disabled selected>Select Bank</option>
                                                        @foreach($bloodgroups as $id=>$bloodgroup)
                                                            <option @yield('disabled') value="{{$id}}" {{ ($userDetails->blood_group_id == $id ) ? 'selected' : '' }}>{{$bloodgroup}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="dob" class="col-md-12">Date of Birth</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Passport Expiration Date" name="dob" value="{{ $userDetails->dob}}" class="form-control form-control-line datepicker" @yield('disabled')>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Profile Pic</label>
                                                <div class="col-md-12">
                                                    <input type="file" placeholder="Upload Photo" name="upload_photo"  class="form-control form-control-line" @yield('disabled')>
                                                </div>
                                            </div>
                                            @if(($userDetails->id == Auth::user()->id))
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update My Details</button>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane" id="attachments" role="tabpanel">
                                    <div class="card-block">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="alert alert-success">
                                                <ul>
                                                    <li>Passport: <a href="{{ url($passportpath.$userDetails->passport)}}">Details</a></li>
                                                    <li>CERPAC: <a href="{{ url($cerpacpath.$userDetails->cerpac)}}">Details</a></li>
                                                    <li>Photo: <a href="{{ url($photopath.$userDetails->passport)}}">Details</a></li>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

@endsection




