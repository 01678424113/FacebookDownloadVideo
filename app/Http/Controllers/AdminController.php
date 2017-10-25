<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.page.index');
    }

    public function getLogin()
    {
        $response = [
            'title'=>'Facebook download videos'
        ];
        return view('admin.page.login',$response);
    }

    public function postLogin(Request $request)
    {
        $user = User::where('username',$request->username)->first();
       if($user->password == md5($request->password)){
           $username = $user->name;
           Session::put('username',$username);
           return redirect()->route('admin-home')->with('success','You have successfully login ! ');
       }else{
           return redirect()->back()->with('error','Wrong username or password !');
       }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('getLogin');
    }
}
