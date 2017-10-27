<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Permission;
use Exception;
use Illuminate\Http\Request;
use Session;

class PermissionController extends Controller
{
    public function listPermission(Request $request)
    {
        $response = [
            'title'=>'Permission'
        ];
        $permissions_query = Permission::select([
            'id',
            'name',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by'
        ]);
        if( $request->has('name') && $request->name != ""){
            $permissions_query->where('name','LIKE','%'.$request->name.'%');
        }
        $response['permissions'] = $permissions_query->paginate(20);
        return view('admin.permission.list',$response);
    }

    public function getAddPermission()
    {
        $response = [
            'title'=>'Add permission'
        ];
        return view('admin.permission.add',$response);
    }

    public function postAddPermission(PermissionRequest $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->created_by = Session::get('user_id');
        $permission->created_at = round(microtime(true));
        try{
            $permission->save();
            return redirect()->route('listPermission')->with('success','You have successfully added permission !');
        }catch (Exception $e){
            return redirect()->route('listPermission')->with('error','Error ! Database');
        }
    }

    public function getEditPermission($permission_id)
    {
        $permission = Permission::find($permission_id);
        if(!isset($permission)){
            return redirect()->back()->with('error','Permission is not exist !');
        }
        $response = [
            'title'=>'Edit permission'.$permission->name
        ];
        $response['permission'] = $permission;
        return view('admin.permission.edit',$response);
    }

    public function postEditPermission(PermissionRequest $request,$permission_id)
    {
        $permission = Permission::find($permission_id);
        $permission->name = $request->name;
        $permission->updated_by = Session::get('user_id');
        $permission->updated_at = round(microtime(true));
        try{
            $permission->save();
            return redirect()->back()->with('success','You are successfully fixed permission !');
        }catch (Exception $e){
            return redirect()->back()->with('error','Error ! Database');
        }

    }

    public function deletePermission($permission_id)
    {
        $permission = Permission::find($permission_id);
        if(!isset($permission)){
            return redirect()->back()->with('error','Permission is not exist !');
        }
        $name_permission = $permission->name;
        try{
            $permission->delete();
            return redirect()->back()->with('success','You have deleted'.$name_permission.' successfully !');
        }catch (Exception $e){
            return redirect()->back()->with('error','Error ! Database');
        }
    }
}
