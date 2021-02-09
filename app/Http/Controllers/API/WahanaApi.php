<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wahana;
use App\Employee;
use App\User;
use App\Position;

class WahanaApi extends Controller
{
    public function index(Request $request, $wahana_id = null)
    {
    	if($wahana_id != null)
    	{
	        return response()->json(ResponseOk(Wahana::where("wahana_id", $wahana_id)->get()));
    	}
        return response()->json(ResponseOk(Wahana::all()));
    }
}
