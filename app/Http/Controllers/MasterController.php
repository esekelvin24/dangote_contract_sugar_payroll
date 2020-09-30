<?php 

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Permission;
use App\Role_user;
use App\Permission_role;
use DB;
use Auth;
use Alert;
use Redirect;
use Input;
use Validator;
use App\Email_notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MasterController extends Controller
{

 public function application_Settings()
   {
       $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id;
      

    if($user->hasRole('admin'))
     {
        $email_notifications = Email_notification::where('email_notification_id', 1 )->first();

        return view('application_Settings.application_Settings', compact('email_notifications'));
      }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }


public function ajax_get_email_notification()
{

$notification_value = $_GET["get_option"];

$store_notification_value = Email_notification::where('email_notification_id', 1 )->first();
$store_notification_value->email_notification = $notification_value;
$store_notification_value->update();

 $email_notifications = Email_notification::where('email_notification_id', 1 )->first();
  return view('application_Settings.ajax_get_email_notification', compact('email_notifications'));
}
////////////////////////////////////////////////////////////////////////
//END OF TAG



}