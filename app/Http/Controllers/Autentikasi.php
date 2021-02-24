<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Visitor;
use App\Employee;
use App\User;
use DB;

class Autentikasi extends Controller
{
    public function cekLogin(Request $request)
    {
        $auth_check = Employee::autentikasi($request->input("username", ""), $request->input("password", ""));

        if ($auth_check['status'] == true) {
            $request->session()->put("employee_nik", $auth_check['data']->employee_nik);
            $request->session()->put("employee_name", $auth_check['data']->employee_name);
            $request->session()->put("gender", $auth_check['data']->gender);
            $request->session()->put("id_position", $auth_check['data']->id_position);
            $request->session()->put("username", $auth_check['data']->username);
            $request->session()->put("position_name", $auth_check['data']->position->position_name);
            $data = DB::table('wahana')->where('wahana_id', 'WS01')->first();
            if (session('id_position') != "KS1") {
                if ($data->status == 0) {
                    return redirect()->route('login')->with('Status', 'Program Sudah Tutup');
                } else {

                    return redirect()->route('home')->with('Status', $auth_check['message']);
                }
            } else {
                return redirect()->route('home')->with('Status', $auth_check['message']);
            }
        } else {
            return redirect()->route('login')->with('Status', $auth_check['message']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget("employee_nik");
        $request->session()->forget("employee_name");
        $request->session()->forget("gender");
        $request->session()->forget("id_position");
        $request->session()->forget("username");
        $request->session()->forget("position_name");

        return redirect("/");
    }
}
