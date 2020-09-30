@extends(isset(Auth::user()->id)?'layouts.dash_layout':'../layouts.frontend')
@guest
    <style>
        .header-holder.sticky .main-navigation.navbar-right > li > a {
            color:white !important;
        }
    </style>
@endguest

@section('content')
    <div class="content-box">
        <div class="big-error-w" style="width:100%;text-align: center">
            <img style="width:200px; height: 200px;"  src="{{asset('_img/alert.gif')}}" />
            <h5>
                Illegal Activity Detected!
            </h5>
            <h4>
                Kindly refrain from such to avoid your account being blocked..You have been warned!
            </h4>

        </div>

    </div>
@endsection