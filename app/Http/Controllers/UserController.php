<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function user(){
   	$user = User::all();
   	return view('user/user',['user'=>$user]);
   }

   public function usercreate(){
   	return view('user/usercreate');
   }

   public function usercreateadd(Request $request){
   	$this->validate($request,[
   		'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'level'  => ['required'],
   	]);

		User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'level' => $request['level'],
         ]);
		return redirect('user');
   }
}
