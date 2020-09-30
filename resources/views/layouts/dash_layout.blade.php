<?php
use Illuminate\Support\Facades\DB;
use App\Maintab;
use App\Subtab;
use App\Rights;
use App\Settings;
use App\Designation;
use App\Session as School_Session;
use App\Http\Controllers\Utilities;

if(!is_null(Auth::user())){

$maintenance_mode=Settings::select('value')->where('name','maintenance_mode')->get()[0]->value;
if(!$maintenance_mode){
$session_name_collection=School_Session::select('session_name')->where('session_status',1)->get();
if(!$session_name_collection->isEmpty())
{
    $session_name=$session_name_collection[0]->session_name;
}
$company_name=Settings::select('value')->where('name','company_name')->get()[0]->value;
//$rights=Auth::user()->rights;
//$subrights=Auth::user()->subrights;
//$suberrights=Auth::user()->suberrights;

#IF STUDENT DO THINGS
if(Auth::user()->user_type==1){
    //check if student is registered
    $application_collection = DB::table('tbl_applications as a')
        ->select('session_name', 'degree_short_name', 'entry_type', 'faculty_name', 'department_name' )
        ->leftjoin('tbl_programmes as p', 'p.programme_id', 'a.programme_id')
        ->leftjoin('tbl_faculty as f', 'f.faculty_id', 'p.faculty_id')
        ->leftjoin('tbl_department as d', 'd.department_id', 'p.department_id')
        ->leftjoin('tbl_session as s', 's.session_id', 'a.session_id')
        ->leftjoin('tbl_degree_type as dt', 'dt.degree_type_id', 'p.degree_type_id')
        ->where('action_1_status',2)
        ->where('action_2_status',2)
        ->where('action_3_status',2)
        ->where('user_id',Auth::user()->id)
        ->orderBy('application_id','desc')
        ->limit(1)
        ->get();
}

$first_name_top=Auth::user()->firstname;
$last_name_top=Auth::user()->lastname;
$pic_top=Auth::user()->pics;
$rights_id_top=Auth::user()->rights_id;
$designation_id_top=Auth::user()->designation_id;
$rights_collection=Rights::where('rights_id',$rights_id_top)->get();
$rights_name_top=$rights_collection[0]->rights_name;
$rights=$rights_collection[0]->rights;
$subrights=$rights_collection[0]->subrights;
//$suberrights=Auth::user()->suberrights;
$designation_name_top=Designation::select('designation')->where('designation_id',$designation_id_top)->get()[0]->designation;
   if($rights_id_top==1){//Super User
       foreach(Maintab::all() as $m)
       {
           $main_tab_id[]=	$m->main_tab_id;
           $main_tab_name[]=$m->main_tab_name;
           $main_tab_icons[]=$m->icon;
       }
       foreach(Subtab::all() as $m)
       {
           $sub_tab_id[] =	$m->sub_tab_id;
           $main_sub_tab_id[]=$m->main_tab_id;
           $sub_tab_name[]=$m->sub_tab_name;
           $sub_tab_named_route[]=$m->sub_tab_named_route;
       }
   }else{
    foreach(Maintab::find(explode(",",$rights)) as $m)
    {
        $main_tab_id[]=	$m->main_tab_id;
        $main_tab_name[]=$m->main_tab_name;
        $main_tab_icons[]=$m->icon;
    }
    foreach(Subtab::find(explode(",",$subrights)) as $m)
    {
        $sub_tab_id[] =	$m->sub_tab_id;
        $main_sub_tab_id[]=$m->main_tab_id;
        $sub_tab_name[]=$m->sub_tab_name;
        $sub_tab_named_route[]=$m->sub_tab_named_route;
    }
    }


$route = Route::current()->getName();
##CHECK IF IT EXISTS AT THE FIRST LEVEL
if($route=="dashboard") {
    //We are at the landing page
}
else //It doesn't exist,so check subtab i.e 2nd Level
{
    //The main question here is, does the user have the right to access current page?
    if(Subtab::select('main_tab_id', 'sub_tab_name')->where('sub_tab_named_route',$route)->exists())
    {
        $query = Subtab::select('sub_tab_id','main_tab_id', 'sub_tab_name')->where('sub_tab_named_route',$route)->get();
        foreach($query as $r)
        {
            $URL_SECOND_LEVEL_MAIN_TAB_ID = $r -> main_tab_id;
            $URL_SECOND_LEVEL_NAME = $r -> sub_tab_name;
            //This is for checking if user should be here
            $URL_SECOND_LEVEL_SUB_TAB_ID = $r->sub_tab_id;
        }
        //Now, we check if User really was assigned this right
        if(isset($sub_tab_id) && in_array($URL_SECOND_LEVEL_SUB_TAB_ID, $sub_tab_id) && in_array($URL_SECOND_LEVEL_MAIN_TAB_ID,$main_tab_id))
        {
             //Now we can get the Main Tab Name
            if(Maintab::select('main_tab_name','main_tab_id')->where('main_tab_id',$URL_SECOND_LEVEL_MAIN_TAB_ID)->exists())
            {
                $query = Maintab::select('main_tab_id','main_tab_name')->where('main_tab_id',$URL_SECOND_LEVEL_MAIN_TAB_ID)->get();
                foreach($query as $r)
                {
                    $URL_FIRST_LEVEL_NAME = $r -> main_tab_name;
                    $URL_FIRST_LEVEL_ID = $r -> main_tab_id;
                }
            }
        }else{
           //User just typed in url name and should be redirected and warned and warning should be logged also if you have the time
            ?>
            <script>
                window.replace=url('/')+"/warning";
            </script>
        <?php
        header("Location:".url('/').'/warning');
                exit("You are warned");
                }
            }
            else{
               //Already handled! i.e the else part of the if Auth:user is null
            }
}
}else{
    //Maintenance mode things
?>
            <script>
            window.replace=url('/')+"/maintenance";
            </script>
<?php
header("Location:".url('/').'/maintenance');
exit();
        }
}else{
    //redirect me I'm in a non existing route
 ?>
<script>
    console.log("How did I get to dash_layout?");
    window.replace=url('/')+"/404";
</script>
<?php
header("Location:".url('/').'/404');
exit();
}

?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{$company_name}}</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="Augustine Nwabuwe" name="author">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="{{asset('bower_components/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/sweetalert/sweet-alert.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css?version=4.4.0')}}" rel="stylesheet">
    <link href="{{asset('icon_fonts_assets/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <link href="{{asset('icon_fonts_assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("bower_components/vex/vex.css")}}" />
    <link rel="stylesheet" href="{{asset("bower_components/vex/vex-theme-flat-attack.css")}}" />
    <link rel="stylesheet" href="{{asset("bower_components/vex/vex-theme-default.css")}}" />

    <!-- start: favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('_img/fav/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('_img/fav/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('_img/fav/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('_img/fav/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('_img/fav/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('_img/fav/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('_img/fav/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('_img/fav/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('_img/fav/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('_img/fav/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('_img/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('_img/fav/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('_img/fav/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('_img/fav/manifest.json')}}">
    <link href="{{asset("bower_components/time_picker/mdtimepicker.css")}}" rel="stylesheet" type="text/css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('_img/fav/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="blue">
    <!-- end: Favicon -->

    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
          @yield('required_css')
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>
<body class="menu-position-side menu-side-left full-screen with-content-panel">
<div class="all-wrapper with-side-panel solid-bg-all">
    {{--<div aria-hidden="true" class="onboarding-modal modal fade animated show-on-load" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Skip Intro</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-slider-w">
                    <div class="onboarding-slide">
                        <div class="onboarding-media">
                            <img alt="" src="{{asset('img/bigicon2.png')}}" width="200px">
                        </div>
                        <div class="onboarding-content with-gradient">
                            <h4 class="onboarding-title">
                                Example of onboarding screen!
                            </h4>
                            <div class="onboarding-text">
                                This is an example of a multistep onboarding screen, you can use it to introduce your customers to your app, or collect additional information from them before they start using your app.
                            </div>
                        </div>
                    </div>
                    <div class="onboarding-slide">
                        <div class="onboarding-media">
                            <img alt="" src="{{asset('img/bigicon5.png')}}" width="200px">
                        </div>
                        <div class="onboarding-content with-gradient">
                            <h4 class="onboarding-title">
                                Example Request Information
                            </h4>
                            <div class="onboarding-text">
                                In this example you can see a form where you can request some additional information from the customer when they land on the app page.
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Your Full Name</label><input class="form-control" placeholder="Enter your full name..." type="text" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Your Role</label><select class="form-control">
                                                <option>
                                                    Web Developer
                                                </option>
                                                <option>
                                                    Business Owner
                                                </option>
                                                <option>
                                                    Other
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="onboarding-slide">
                        <div class="onboarding-media">
                            <img alt="" src="{{asset('img/bigicon6.png')}}" width="200px">
                        </div>
                        <div class="onboarding-content with-gradient">
                            <h4 class="onboarding-title">
                                Showcase App Features
                            </h4>
                            <div class="onboarding-text">
                                In this example you can showcase some of the features of your application, it is very handy to make new users aware of your hidden features. You can use boostrap columns to split them up.
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="features-list">
                                        <li>
                                            Fully Responsive design
                                        </li>
                                        <li>
                                            Pre-built app layouts
                                        </li>
                                        <li>
                                            Incredible Flexibility
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="features-list">
                                        <li>
                                            Boxed & Full Layouts
                                        </li>
                                        <li>
                                            Based on Bootstrap 4
                                        </li>
                                        <li>
                                            Developer Friendly
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    {{--<div class="search-with-suggestions-w">
        <div class="search-with-suggestions-modal">
            <div class="element-search">
                <input class="search-suggest-input" placeholder="Start typing to search..." type="text">
                <div class="close-search-suggestions">
                    <i class="os-icon os-icon-x"></i>
                </div>
                </input>
            </div>
            <div class="search-suggestions-group">
                <div class="ssg-header">
                    <div class="ssg-icon">
                        <div class="os-icon os-icon-box"></div>
                    </div>
                    <div class="ssg-name">
                        Projects
                    </div>
                    <div class="ssg-info">
                        24 Total
                    </div>
                </div>
                <div class="ssg-content">
                    <div class="ssg-items ssg-items-boxed">
                        <a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url({{asset('img/company6.png')}})"></div>
                            <div class="item-name">
                                Integ<span>ration</span> with API
                            </div>
                        </a><a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url({{asset('img/company7.png')}})"></div>
                            <div class="item-name">
                                Deve<span>lopm</span>ent Project
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="search-suggestions-group">
                <div class="ssg-header">
                    <div class="ssg-icon">
                        <div class="os-icon os-icon-users"></div>
                    </div>
                    <div class="ssg-name">
                        Customers
                    </div>
                    <div class="ssg-info">
                        12 Total
                    </div>
                </div>
                <div class="ssg-content">
                    <div class="ssg-items ssg-items-list">
                        <a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url({{asset('img/avatar1.jpg')}})"></div>
                            <div class="item-name">
                                John Ma<span>yer</span>s
                            </div>
                        </a><a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url({{asset('img/avatar2.jpg')}})"></div>
                            <div class="item-name">
                                Th<span>omas</span> Mullier
                            </div>
                        </a><a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url({{asset('img/avatar3.jpg')}})"></div>
                            <div class="item-name">
                                Kim C<span>olli</span>ns
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="search-suggestions-group">
                <div class="ssg-header">
                    <div class="ssg-icon">
                        <div class="os-icon os-icon-folder"></div>
                    </div>
                    <div class="ssg-name">
                        Files
                    </div>
                    <div class="ssg-info">
                        17 Total
                    </div>
                </div>
                <div class="ssg-content">
                    <div class="ssg-items ssg-items-blocks">
                        <a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-file-text"></i>
                            </div>
                            <div class="item-name">
                                Work<span>Not</span>e.txt
                            </div>
                        </a><a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-film"></i>
                            </div>
                            <div class="item-name">
                                V<span>ideo</span>.avi
                            </div>
                        </a><a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-database"></i>
                            </div>
                            <div class="item-name">
                                User<span>Tabl</span>e.sql
                            </div>
                        </a><a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-image"></i>
                            </div>
                            <div class="item-name">
                                wed<span>din</span>g.jpg
                            </div>
                        </a>
                    </div>
                    <div class="ssg-nothing-found">
                        <div class="icon-w">
                            <i class="os-icon os-icon-eye-off"></i>
                        </div>
                        <span>No files were found. Try changing your query...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <div class="menu-mobile menu-activated-on-click color-scheme-dark">
            <div class="mm-logo-buttons-w">
                <a class="mm-logo" href="{{route('dashboard')}}"><img width="90" height="90" src="{{asset('_img/fav/apple-icon-76x76.png')}}"><span>{{$company_name}}</span></a>
                <div class="mm-buttons">
                    {{--<div class="content-panel-open">
                        <div class="os-icon os-icon-grid-circles"></div>
                    </div>--}}
                    <div class="mobile-menu-trigger">
                        <div class="os-icon os-icon-hamburger-menu-1"></div>
                    </div>
                </div>
            </div>
            <div class="menu-and-user">
                <div class="logged-user-w">
                    <div class="avatar-w">
                        <img alt="" src="{{asset("_img/users/$pic_top")}}">
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">
                            {{$first_name_top.' '.$last_name_top}}
                        </div>
                        <div class="logged-user-role">
                            {{$designation_name_top}}
                        </div>
                    </div>
                </div>
                <!--------------------
                START - Mobile Menu List
                -------------------->
                <ul class="main-menu">
                    <li class="<?php if( Route::current()->getName()=='dashboard') echo "menu_colour" ?>  "  >
                        <a href="{{route('dashboard')}}">
                            <div class="icon-w">
                                <div class="icon-home"></div>
                            </div>
                            <span>Dashboard</span></a>
                    </li>
                        <?php
                        for($a=0;$a<count($main_tab_id);$a++) {
                            ?>
                                    <li class="has-sub-menu <?php
                                    if(isset($URL_FIRST_LEVEL_ID))
                                    {
                                        if($main_tab_id[$a]==$URL_FIRST_LEVEL_ID)
                                            echo "menu_colour";
                                    }
                                    ?>">
                                        <a href="#">
                                            <div class="icon-w">
                                                <div class="<?php echo $main_tab_icons[$a] ?>"></div>
                                            </div>
                                            <span><?php echo ucwords(strtolower($main_tab_name[$a])) ?></span></a>
                                        <ul class="sub-menu">
                                            <?php
                                            for($b=0;$b<count($sub_tab_id);$b++) {
                                            if ($main_sub_tab_id[$b] == $main_tab_id[$a]) {
                                                ?>
                                            <li>
                                                <a href="<?php
                                                if( $sub_tab_named_route[$b]!="" or is_null($sub_tab_named_route[$b]) )
                                                    echo route($sub_tab_named_route[$b]);
                                                else
                                                    echo "#";
                                                ?>"><?php echo $sub_tab_name[$b] ?></a>
                                            </li>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </li>
                        <?php
                        }
                        ?>
                    <li>
                        <a href="#" onclick="document.getElementById('logout-form').submit();">
                            <div class="icon-w">
                                <div class="os-icon os-icon-log-out"></div>
                            </div>
                            <span>Log Out</span></a>
                    </li>
                </ul>
                <!--------------------
                END - Mobile Menu List
                -------------------->
            </div>
        </div>
        <!--------------------
        END - Mobile Menu
        -------------------->


        <!--------------------
        START - Main Menu
        -------------------->
        <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-inside sub-menu-color-bright selected-menu-color-light menu-activated-on-click menu-has-selected-link">
            <div class="logo-w">
                <a class="logo" href="{{route('dashboard')}}">
                    <div class="animated bounce">
                        <img src="{{asset('_img/fav/apple-icon-76x76.png')}}" alt="">
                    </div>
                    <div class="logo-label animated fadeInUpBig">
                        {{$company_name}}
                    </div>
                </a>
            </div>
            <div class="side-menu-magic animated fadeIn">
                <!-- END WIDGET CLOCK -->
                <div class="widget widget-primary widget-padding-sm">
                    <div class="widget-big-int plugin-clock">00:00</div>
                    <div class="widget-subtitle plugin-date">Loading...</div>
                    @if(isset($session_name) && $session_name!="")
                        <span class="badge badge-warning" style="font-size:12px"> <span class="icon-hourglass"></span> Current Session : {{$session_name}} </span>
                    @endif
                </div>
                <!-- END WIDGET CLOCK -->
            </div>
            {{--<div class="logged-user-w avatar-inline">
                <div class="logged-user-i">
                    <div class="avatar-w">
                        <img alt="" src="img/avatar1.jpg">
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">
                            Maria Gomez
                        </div>
                        <div class="logged-user-role">
                            Administrator
                        </div>
                    </div>
                    <div class="logged-user-toggler-arrow">
                        <div class="os-icon os-icon-chevron-down"></div>
                    </div>
                    <div class="logged-user-menu color-style-bright">
                        <div class="logged-user-avatar-info">
                            <div class="avatar-w">
                                <img alt="" src="img/avatar1.jpg">
                            </div>
                            <div class="logged-user-info-w">
                                <div class="logged-user-name">
                                    Maria Gomez
                                </div>
                                <div class="logged-user-role">
                                    Administrator
                                </div>
                            </div>
                        </div>
                        <div class="bg-icon">
                            <i class="os-icon os-icon-wallet-loaded"></i>
                        </div>
                        <ul>
                            <li>
                                <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                            </li>
                            <li>
                                <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>--}}
            {{--<div class="menu-actions">
                <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
                    <i class="os-icon os-icon-mail-14"></i>
                    <div class="new-messages-count">
                        12
                    </div>
                    <div class="os-dropdown light message-list">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            John Mayers
                                        </h6>
                                        <h6 class="message-title">
                                            Account Update
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar2.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Phil Jones
                                        </h6>
                                        <h6 class="message-title">
                                            Secutiry Updates
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar3.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Bekky Simpson
                                        </h6>
                                        <h6 class="message-title">
                                            Vacation Rentals
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar4.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Alice Priskon
                                        </h6>
                                        <h6 class="message-title">
                                            Payment Confirmation
                                        </h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
                    <i class="os-icon os-icon-ui-46"></i>
                    <div class="os-dropdown">
                        <div class="icon-w">
                            <i class="os-icon os-icon-ui-46"></i>
                        </div>
                        <ul>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
                    <i class="os-icon os-icon-zap"></i>
                    <div class="new-messages-count">
                        4
                    </div>
                    <div class="os-dropdown light message-list">
                        <div class="icon-w">
                            <i class="os-icon os-icon-zap"></i>
                        </div>
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            John Mayers
                                        </h6>
                                        <h6 class="message-title">
                                            Account Update
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar2.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Phil Jones
                                        </h6>
                                        <h6 class="message-title">
                                            Secutiry Updates
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar3.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Bekky Simpson
                                        </h6>
                                        <h6 class="message-title">
                                            Vacation Rentals
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar4.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Alice Priskon
                                        </h6>
                                        <h6 class="message-title">
                                            Payment Confirmation
                                        </h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>--}}
            {{--<div class="element-search autosuggest-search-activator">
                <input placeholder="Start typing to search..." type="text">
            </div>--}}
            <h1 class="menu-page-header">
                Page Header
            </h1>
            <ul class="main-menu">
                <li class="sub-header">
                    <span>Main Navigation</span>
                </li>
                <!-- start: menu -->
                <style>
                    .menu-w.sub-menu-style-inside.sub-menu-color-bright ul.main-menu > li.active > a span, .menu-w.sub-menu-style-inside.sub-menu-color-dark ul.main-menu > li.active > a span{
                        color:#1f1d5e !important;
                    }
                    .menu-w.sub-menu-style-inside.sub-menu-color-bright ul.main-menu > li.active > a .icon-w, .menu-w.sub-menu-style-inside.sub-menu-color-dark ul.main-menu > li.active > a .icon-w {
                        color: #1f1d5e !important;
                    }
                    li.menu_colour .sub-menu-w .sub-menu-i .sub-menu li a{
                        color:white !important;
                    }
                </style>
                   @include('inc.lefty')
                <!-- end: menu -->

            </ul>

        </div>
        <!--------------------
        END - Main Menu
        -------------------->
        <div class="content-w">
            <!--------------------
            START - Top Bar
            -------------------->
            <div class="top-bar color-scheme-transparent">
                <!--------------------
                START - Top Menu Controls
                -------------------->
                <div class="top-menu-controls">
                    {{--<div class="element-search autosuggest-search-activator">
                        <input placeholder="Start typing to search..." type="text">
                    </div>--}}
                    <!--------------------
                    START - Messages Link in secondary top menu
                    -------------------->
                        {{--<div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
                            <i class="os-icon os-icon-bell"></i>
                            <div class="new-messages-count">
                                12
                            </div>
                            <div class="os-dropdown light message-list">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <div class="message-content">
                                                <h6 class="message-from">
                                                    A new student just applied
                                                </h6>
                                                <h6 class="message-title">
                                                    Account Update
                                                </h6>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>--}}
                    <!--------------------
                    END - Messages Link in secondary top menu
                    --------------------><!--------------------
              START - Settings Link in secondary top menu
              -------------------->
                    {{--<div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                        <i class="os-icon os-icon-ui-46"></i>
                        <div class="os-dropdown">
                            <div class="icon-w">
                                <i class="os-icon os-icon-ui-46"></i>
                            </div>
                            <ul>
                                <li>
                                    <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                                </li>
                                <li>
                                    <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                                </li>
                                <li>
                                    <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                                </li>
                                <li>
                                    <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>--}}
                    <!--------------------
                    END - Settings Link in secondary top menu
                    --------------------><!--------------------
              START - User avatar and menu in secondary top menu
              -------------------->
                    <div class="logged-user-w">
                        <div class="logged-user-i">
                            <div class="avatar-w">
                                <img alt="" src="{{asset("_img/users/$pic_top")}}">
                            </div>
                            <div class="logged-user-menu color-style-bright">
                                <div class="logged-user-avatar-info">
                                    <div class="avatar-w">
                                        <img alt="" src="{{asset("_img/users/$pic_top")}}">
                                    </div>
                                    <div class="logged-user-info-w">
                                        <div class="logged-user-name">
                                            {{$first_name_top.' '.$last_name_top}}
                                        </div>
                                        <div class="logged-user-role">
                                           {{$designation_name_top}}
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-icon">
                                    <i class="os-icon os-icon-wallet-loaded"></i>
                                </div>
                                <ul>
                                    {{--<li>
                                        <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                                    </li>
                                    <li>
                                        <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                                    </li>
                                    <li>
                                        <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                                    </li>--}}
                                    <li>
                                        <a class="profile" href="#"><i class="os-icon os-icon-user"></i><span>Profile</span></a>
                                    </li>
                                    <li>
                                        <a onclick="
										 document.getElementById('logout-form').submit();" href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span>
                                        </a>
                                        <form id="logout-form" action="<?php echo route('logout') ?>" method="POST" style="display: none;">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" />
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--------------------
                    END - User avatar and menu in secondary top menu
                    -------------------->
                </div>
                <!--------------------
                END - Top Menu Controls
                -------------------->
            </div>
            <!--------------------
            END - Top Bar
            --------------------><!--------------------
          START - Breadcrumbs
          -------------------->
            <div style="padding-left: 25px">
                @if(Auth::user()->user_type==2)
                    <span style="display: inline-block;font-size:14px;"><i style="color:#8a6d3b" class="fa fa-user-o" ></i> <span>&nbsp;USER TYPE</span> : STAFF</span>
                    <span style="display: inline-block;font-size:14px; padding-left: 15px"><i style="color:#8a6d3b" class="fa fa-cog" ></i> <span>&nbsp;DESIGNATION</span> : {{strtoupper($designation_name_top)}}</span>
                @else
                    @if(isset($application_collection) && $application_collection->isNotEmpty())
                    <span style="display: inline-block;font-size:14px;"><i style="color:#8a6d3b" class="fa fa-user-o" ></i> <span>&nbsp;USER TYPE</span> : STUDENT</span>
                    <span style="display: inline-block;font-size:14px; margin-left: 15px;font-weight: bold " class="badge badge-warning-inverted"><i style="color:#8a6d3b" class="fa fa-code" ></i> <span>&nbsp;MAT. NO</span> : {{Utilities::get_matric_number(Auth::user()->id)}}</span>
                    <span style="display: inline-block;font-size:14px; padding-left: 15px"><i style="color:#8a6d3b" class="fa fa-circle-o" ></i> <span>&nbsp;DEPARTMENT</span> : {{$application_collection[0]->department_name}}</span>
                    <span style="display: inline-block;font-size:14px; padding-left: 15px"><i style="color:#8a6d3b" class="fa fa-hourglass" ></i> <span>&nbsp;SESSION APPLIED</span> : {{$application_collection[0]->session_name}}</span>
                    @else
                        <span style="display: inline-block;font-size:14px;"><i style="color:#8a6d3b" class="fa fa-user-o" ></i> <span>&nbsp;USER TYPE</span> : PROSPECTIVE STUDENT</span>
                        <span style="display: inline-block;font-size:14px; margin-left: 15px;font-weight: bold " class="badge badge-warning-inverted"><i style="color:#8a6d3b" class="fa fa-code" ></i> <span>&nbsp;APPLICATION. NO</span> : IAUE-DL-{{Auth::user()->id}}</span>
                        <a href="{{route('apply')}}" style="display: inline-block;font-size:14px; margin-left: 15px;font-weight: bold " class="badge badge-success-inverted">&nbsp;APPLY</a>
                    @endif
                @endif
            </div>
            <ul class="breadcrumb">

                    <li class="breadcrumb-item animated bounce">
                        <a href="{{route('dashboard')}}">Home</a>
                    </li>
                @if(isset($URL_FIRST_LEVEL_NAME))
                    <li class="breadcrumb-item">
                        <a href="#">{{$URL_FIRST_LEVEL_NAME}}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span>{{$URL_SECOND_LEVEL_NAME}}</span>
                    </li>
                @endif
            </ul>
            <!--------------------
            END - Breadcrumbs
            -------------------->
            {{--<div class="content-panel-toggler">
                <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
            </div>--}}
            <div class="content-i">
            @include('inc.basic_notys')
                @yield('content')
                <!--------------------
                START - Sidebar
                -------------------->
                {{--<div class="content-panel">
                    <div class="content-panel-close">
                        <i class="os-icon os-icon-close"></i>
                    </div>
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Quick Links
                        </h6>
                        <div class="element-box-tp">
                            <div class="el-buttons-list full-width">
                                <a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-delivery-box-2"></i><span>Create New Product</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-window-content"></i><span>Customer Comments</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-wallet-loaded"></i><span>Store Settings</span></a>
                            </div>
                        </div>
                    </div>
                    <!--------------------
                    START - Support Agents
                    -------------------->
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Support Agents
                        </h6>
                        <div class="element-box-tp">
                            <div class="profile-tile">
                                <a class="profile-tile-box" href="users_profile_small.html">
                                    <div class="pt-avatar-w">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                    <div class="pt-user-name">
                                        John Mayers
                                    </div>
                                </a>
                                <div class="profile-tile-meta">
                                    <ul>
                                        <li>
                                            Last Login:<strong>Online Now</strong>
                                        </li>
                                        <li>
                                            Tickets:<strong><a href="apps_support_index.html">12</a></strong>
                                        </li>
                                        <li>
                                            Response Time:<strong>2 hours</strong>
                                        </li>
                                    </ul>
                                    <div class="pt-btn">
                                        <a class="btn btn-success btn-sm" href="apps_full_chat.html">Send Message</a>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-tile">
                                <a class="profile-tile-box" href="users_profile_small.html">
                                    <div class="pt-avatar-w">
                                        <img alt="" src="img/avatar3.jpg">
                                    </div>
                                    <div class="pt-user-name">
                                        Ben Gossman
                                    </div>
                                </a>
                                <div class="profile-tile-meta">
                                    <ul>
                                        <li>
                                            Last Login:<strong>Offline</strong>
                                        </li>
                                        <li>
                                            Tickets:<strong><a href="apps_support_index.html">9</a></strong>
                                        </li>
                                        <li>
                                            Response Time:<strong>3 hours</strong>
                                        </li>
                                    </ul>
                                    <div class="pt-btn">
                                        <a class="btn btn-secondary btn-sm" href="apps_full_chat.html">Send Message</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--------------------
                    END - Support Agents
                    --------------------><!--------------------
              START - Recent Activity
              -------------------->
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Recent Activity
                        </h6>
                        <div class="element-box-tp">
                            <div class="activity-boxes-w">
                                <div class="activity-box-w">
                                    <div class="activity-time">
                                        10 Min
                                    </div>
                                    <div class="activity-box">
                                        <div class="activity-avatar">
                                            <img alt="" src="img/avatar1.jpg">
                                        </div>
                                        <div class="activity-info">
                                            <div class="activity-role">
                                                John Mayers
                                            </div>
                                            <strong class="activity-title">Opened New Account</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="activity-box-w">
                                    <div class="activity-time">
                                        2 Hours
                                    </div>
                                    <div class="activity-box">
                                        <div class="activity-avatar">
                                            <img alt="" src="img/avatar2.jpg">
                                        </div>
                                        <div class="activity-info">
                                            <div class="activity-role">
                                                Ben Gossman
                                            </div>
                                            <strong class="activity-title">Posted Comment</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="activity-box-w">
                                    <div class="activity-time">
                                        5 Hours
                                    </div>
                                    <div class="activity-box">
                                        <div class="activity-avatar">
                                            <img alt="" src="img/avatar3.jpg">
                                        </div>
                                        <div class="activity-info">
                                            <div class="activity-role">
                                                Phil Nokorin
                                            </div>
                                            <strong class="activity-title">Opened New Account</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="activity-box-w">
                                    <div class="activity-time">
                                        2 Days
                                    </div>
                                    <div class="activity-box">
                                        <div class="activity-avatar">
                                            <img alt="" src="img/avatar4.jpg">
                                        </div>
                                        <div class="activity-info">
                                            <div class="activity-role">
                                                Jenny Miksa
                                            </div>
                                            <strong class="activity-title">Uploaded Image</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--------------------
                    END - Recent Activity
                    --------------------><!--------------------
              START - Team Members
              -------------------->
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Team Members
                        </h6>
                        <div class="element-box-tp">
                            <div class="input-search-w">
                                <input class="form-control rounded bright" placeholder="Search team members..." type="search">
                            </div>
                            <div class="users-list-w">
                                <div class="user-w with-status status-green">
                                    <div class="user-avatar-w">
                                        <div class="user-avatar">
                                            <img alt="" src="img/avatar1.jpg">
                                        </div>
                                    </div>
                                    <div class="user-name">
                                        <h6 class="user-title">
                                            John Mayers
                                        </h6>
                                        <div class="user-role">
                                            Account Manager
                                        </div>
                                    </div>
                                    <a class="user-action" href="users_profile_small.html">
                                        <div class="os-icon os-icon-email-forward"></div>
                                    </a>
                                </div>
                                <div class="user-w with-status status-green">
                                    <div class="user-avatar-w">
                                        <div class="user-avatar">
                                            <img alt="" src="img/avatar2.jpg">
                                        </div>
                                    </div>
                                    <div class="user-name">
                                        <h6 class="user-title">
                                            Ben Gossman
                                        </h6>
                                        <div class="user-role">
                                            Administrator
                                        </div>
                                    </div>
                                    <a class="user-action" href="users_profile_small.html">
                                        <div class="os-icon os-icon-email-forward"></div>
                                    </a>
                                </div>
                                <div class="user-w with-status status-red">
                                    <div class="user-avatar-w">
                                        <div class="user-avatar">
                                            <img alt="" src="img/avatar3.jpg">
                                        </div>
                                    </div>
                                    <div class="user-name">
                                        <h6 class="user-title">
                                            Phil Nokorin
                                        </h6>
                                        <div class="user-role">
                                            HR Manger
                                        </div>
                                    </div>
                                    <a class="user-action" href="users_profile_small.html">
                                        <div class="os-icon os-icon-email-forward"></div>
                                    </a>
                                </div>
                                <div class="user-w with-status status-green">
                                    <div class="user-avatar-w">
                                        <div class="user-avatar">
                                            <img alt="" src="img/avatar4.jpg">
                                        </div>
                                    </div>
                                    <div class="user-name">
                                        <h6 class="user-title">
                                            Jenny Miksa
                                        </h6>
                                        <div class="user-role">
                                            Lead Developer
                                        </div>
                                    </div>
                                    <a class="user-action" href="users_profile_small.html">
                                        <div class="os-icon os-icon-email-forward"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--------------------
                    END - Team Members
                    -------------------->
                </div>--}}
                <!--------------------
                END - Sidebar
                -------------------->
            </div>
        </div>
    </div>
    <div class="display-type"></div>
</div>
<div class="modal fade profile_modal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body profile-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/time_picker/mdtimepicker.js')}}"></script>
<script src="{{asset('bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('bower_components/moment/moment.js')}}"></script>
<script src="{{asset('bower_components/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('bower_components/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
<script src="{{asset('bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-validator/dist/validator.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('bower_components/dropzone/dist/dropzone.js')}}"></script>
<script src="{{asset('bower_components/editable-table/mindmup-editabletable.js')}}"></script>
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{asset('bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('bower_components/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('bower_components/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/util.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/alert.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/button.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/carousel.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/collapse.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/dropdown.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/modal.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/tab.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/tooltip.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/js/dist/popover.js')}}"></script>
<script src="{{asset('bower_components/jquery.blockUI.js')}}"></script>
<script src="{{asset('bower_components/sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('js/demo_customizer.js?version=4.4.0')}}"></script>
<script src="{{asset('js/main.js?version=4.4.0')}}"></script>
<script src="{{asset("bower_components/vex/vex.combined.min.js")}}"></script>
<script>
    var templatePlugins = function(){

        var tp_clock = function(){

            function tp_clock_time(){
                var now     = new Date();
                var hour    = now.getHours();
                var minutes = now.getMinutes();

                hour = hour < 10 ? '0'+hour : hour;
                minutes = minutes < 10 ? '0'+minutes : minutes;

                $(".plugin-clock").html(hour+"<span>:</span>"+minutes);
            }
            if($(".plugin-clock").length > 0){

                tp_clock_time();

                window.setInterval(function(){
                    tp_clock_time();
                },10000);

            }
        }

        var tp_date = function(){

            if($(".plugin-date").length > 0){

                var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

                var now     = new Date();
                var day     = days[now.getDay()];
                var date    = now.getDate();
                var month   = months[now.getMonth()];
                var year    = now.getFullYear();

                $(".plugin-date").html(day+", "+month+" "+date+", "+year);
            }

        }

        return {
            init: function(){
                tp_clock();
                tp_date();
            }
        }
    }();
    templatePlugins.init();

    $('body').on('click','button.save_profile_pic',function(e){
        e.preventDefault();
        var allowExt=['jpg','jpeg','png'];
        var filename= $("input[name='pic']").val();
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
            var formData = new FormData($('form#pic')[0]);
            $.ajax(
                {
                    type:"POST",
                    data:formData,
                    url:"{{route('submit_profile_pic')}}",
                    cache:false,
                    contentType:false,
                    processData:false,
                    beforeSend:function()
                    {
                        $('body').block({ message: null });
                    },
                    error: function(r)
                    {
                        $('body').unblock();
                        vex.dialog.alert({
                            unsafeMessage: `<div style="text-align: center"><img src="_img/barred.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    There were errors, please try again</div>`,
                        });
                    },
                    success: function(r)
                    {
                        $('body').unblock();
                        vex.dialog.alert({
                            unsafeMessage: `<div style="text-align: center"><img src="{{asset('_img/success.png')}}" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Profile picture successfully changed</div>`,
                        });
                        setTimeout(function(){
                            window.location.reload();
                        },2000);
                    }

                }
            );
        }
    });
    $('body').on('click','a.profile',function(){
        $.ajax(
            {
                type:"GET",
                url:"{{route('profile')}}",
                cache:false,
                contentType:false,
                processData:false,
                beforeSend:function()
                {
                    //$('form#upload_offer').block({ message: null });
                },
                error: function(r)
                {
                    //$('form#upload_offer').unblock();
                    vex.dialog.alert({
                        unsafeMessage: `<div style="text-align: center"><img src="_img/barred.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    There were errors, please try again</div>`,
                    });
                },
                success: function(r)
                {
                    $('div.profile-body').html(r);
                    $('.profile_modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                }

            }
        );
    });
</script>
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@yield('required_js')
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@yield('additional_js')
</body>

</html>
