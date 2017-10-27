<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Permission;
use App\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUser(Request $request)
    {
        $response = [
            'title'=>'User'
        ];

        $users_query = User::select([
            'id',
            'username',
            'password',
            'name',
            'permission_id',
            'created_at'
        ]);
        if( $request->has('key_setting_search') && $request->key_setting_search != ""){
            $users_query->where('username','LIKE','%'.$request->key_setting_search.'%');
        }
        $response['users'] = $users_query->paginate(20);
        return view('admin.user.list',$response);
    }

    public function getAddUser()
    {
        $response = [
            'title'=>'Add user'
        ];
        $permissions = Permission::all();
        $response['permissions'] = $permissions;
        return view('admin.user.add',$response);
    }

    public function postAddUser(AddUserRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = md5($request->password);
        $user->name = $request->name;
        $user->permission_id = $request->permission_id;
        $user->created_at = round(microtime(true));

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
        $permissions = Permission::all();
        $response['permissions'] = $permissions;
        return view('admin.user.edit',$response);
    }
    public function postEditUser(EditUserRequest $request, $user_id)
    {
        $user = User::find($user_id);
        if($request->has('password')){
            $user->password = md5($request->password);
        }
        $user->name = $request->name;
        $user->permission_id = $request->permission_id;
        $user->updated_at = round(microtime(true));
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
