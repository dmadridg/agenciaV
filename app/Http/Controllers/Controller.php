<?php

namespace App\Http\Controllers;

use App\Traits\GeneralFunctions;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

setlocale(LC_ALL,"es_ES");

class Controller extends BaseController
{
	#Declare a middleware in the construct, so we can access to the current user!
	function __construct() {
        date_default_timezone_set('America/Mexico_City');
        $this->summer = date('I');
        $this->actual_date = date('Y-m-d');
        $this->actual_month = date('Y-m');
        $this->actual_datetime = date('Y-m-d H:i:s');
        $this->app_customer_id = "2763f09c-dadf-4e3c-af1e-bfe55956821c";
        $this->app_customer_key = "ODg3ZTBiZjItODJjNS00MzljLTkyMjgtY2I3ODFhZGQxNmUz";
        $this->app_customer_icon = asset("img/icon_customer.png");
        
        $this->middleware(function ($request, $next) {
            $this->current_user = auth()->user();

            return $next($request);
        });
	}
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, GeneralFunctions;
}
