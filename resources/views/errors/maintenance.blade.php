<?php
use App\Settings;
$settings_collection=Settings::select('value')->get();
$maintenance_mode=$settings_collection[2]->value;
if(!$maintenance_mode){
header("Location:".url('/'));
exit();
}
?>
<link href="{{asset('css/main.css?version=4.4.0')}}" rel="stylesheet">
    <div class="content-box">
        <div class="big-error-w" style="width:80%">
            <img width="90%" src="{{asset('_img/maintenance.jpg')}}" />
            <h3 style="font-weight: bold">
               SITE IS UNDER MAINTENANCE
            </h3>
            <h4>
                We are installing critical updates. Please check back soon..
            </h4>

        </div>

    </div>