<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Visitor;
use App\Employee;
use App\User;

class Autentikasi extends Controller
{
    public function cekLogin(Request $request)
    {
        $data_login = $request->all();

        $cek_email = User::where("email", $data_login['email'])->first();
        if(!empty($cek_email))
        {
            $cek_password = Hash::check($data_login['password'], $cek_email->password);
            if($cek_password)
            {
                if($cek_email->status == 0)
                {
                    return response()->json(ResponseError("Akun Anda tidak aktif. Silahkan hubungi administrator!"));
                }

                if($cek_email->level == 1) // pegawai
                {
                    $detail = Employee::find($cek_email->id);
                    if($detail->id_position != "KS4")
                    {
                        return redirect()->route('login')->with('Status', "Email atau assword salah!");
                    }

                    $name = $detail->employee_name;
                    $code = $detail->NIK;
                }
                else // pengunjung
                {
                    $detail = Visitor::find($cek_email->id);
                    $name = $detail->visitor_name;
                    $code = $detail->visitor_code;
                }

                return response()->json(ResponseOk(array(
                    "id"    => $cek_email->id,
                    "email"    => $cek_email->email,
                    "level"    => $cek_email->level,
                    "name"   => $name,
                    "code"   => $code
                )));
            }
            else
            {
                return response()->json(ResponseError("Email atau password salah!"));
            }
        }
        else
        {   
            return response()->json(ResponseError("Email salah!"));
        }
    }
}
