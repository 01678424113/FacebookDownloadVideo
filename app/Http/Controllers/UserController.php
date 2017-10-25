<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUser()
    {
        $response = [
            'title'=>'User'
        ];
        $users_query = User::select([
            'id',
            'username',
            'password',
            'name',
            'permission'
        ]);
       /* if( $request->has('key_setting_search') && $request->key_setting_search != ""){
            $settings_query->where('key_setting','LIKE','%'.$request->key_setting_search.'%');
        }*/
        $response['users'] = $users_query->paginate(20);
        return view('admin.user.list',$response);
    }

    public function getAddUser()
    {
        $response = [
            'title'=>'Add user'
        ];
        return view('admin.user.add',$response);
    }

    public function postAddUser(AdminRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = md5($request->password);
        $user->name = $request->name;
        $user->permission = $request->permission;
        try{
            $user->save();
            return redirect()->route('listUser')->with('success','You have successfully added user !');
        }catch (Exception $e){
            return redirect()->route('listUser')->with('error','Error ! Database');
        }
    }
    public function getEditUser($user_id)
    {
        $user = User::find($user_id);
        if(!isset($user)){
            return redirect()->back()->with('error','Setting is not exist !');
        }
        $response = [
            'title'=>'Edit setting'.$user->name
        ];
        $response['user'] = $user;
        return view('admin.user.edit',$response);
    }
    public function postEditUser(AdminRequest $request, $user_id)
    {
        $user = User::find($user_id);
        $user->username = $request->username;
        if($request->has('password')){
            $user->password = md5($request->password);
        }
        $user->name = $request->name;
        $user->permission = $request->permission;
        try{
            $user->save();
            return redirect()->back()->with('success','You are successfully fixed user !');
        }catch (Exception $e){
            return redirect()->back()->with('error','Error ! Database');
        }

    }
    public function deleteUser($user_id)
    {
        $user = User::find($user_id);
        try{
            $user->delete();
            return redirect()->back()->with('success','Delete successfully user !');
        }catch (Exception $e){
            return redirect()->back()->with('error','User is not exist !');
        }
    }

}
