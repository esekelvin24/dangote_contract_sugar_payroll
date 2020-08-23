<?php

namespace App\Http\Middleware;
use App\Model\IMEI;


use Closure;

class AuthKey
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
         $token = $request->header('Authorization');

         $imei = $request->header('Imei');

        $imei_res = IMEI::where('imei_no', '=', $imei)->get();
        $imeiCount = $imei_res->count();

        if($token != "ESEKELVINjnjfnvkjdjk3j4j3j4jk34jjj123UVBIEKPAHOR")
        {
            return response()->json(['message'=> 'APP KEY NOT FOUND','code'=>'08'], 200);
        }

        if ($imei == "")
        {
            return response()->json(['message'=> 'Device ID Required, Please contact IT Department','code'=>'07'], 200);

        }

        if ($imeiCount < 1)
        {
            return response()->json(['message'=> 'Device not profiled, Please contact IT Department','code'=>'06'], 200);
        }

        return $next($request);  
    }
}
