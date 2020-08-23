<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Route;
use App\Model\MenuGroup;
use DB;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $currentPath = Route::currentRouteName();
        $arr = explode("~",$currentPath);
        $menu_id = $arr[0];
        $menu_path = $arr[1];



        


        $role_arr = Auth::user()->roles;
        $role = $role_arr->pluck('id');

        $rows = MenuGroup::where('menu_id', $menu_id)->where('role_id', $role) 
        ->count();
        
        if ($rows < 1)
        {
            return redirect('/not_authorized'); 
        }

        $user = DB::table("users")->where('email',"=",Auth::user()->email)->first();

        if ($user->passchg_logon == 1)
        {
            return redirect('/change-password/'.Auth::user()->id)->with("error","You are required to change your password at first login"); 
        }


        /*
        $userRole = Auth::user()->roles->pluck('role_name');

        if(!$userRole->contains('Administration'))
        {
           return redirect('/not_authorized');
        }*/


        return $next($request);
        
    }
}
