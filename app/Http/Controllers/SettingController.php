<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use Mockery\Exception;

class SettingController extends Controller
{
    public function listSetting(Request $request)
    {
        $response = [
            'title'=>'Setting'
        ];
        $settings_query = Setting::select([
            'id',
            'key_setting',
            'value_setting'
        ]);
        if( $request->has('key_setting_search') && $request->key_setting_search != ""){
            $settings_query->where('key_setting','LIKE','%'.$request->key_setting_search.'%');
        }
        $response['settings'] = $settings_query->paginate(20);
        return view('admin.setting.list',$response);
    }

    public function getAddSetting()
    {
        $response = [
            'title'=>'Add setting'
        ];
        return view('admin.setting.add',$response);
    }

    public function postAddSetting(SettingRequest $request)
    {
        $setting = new Setting();
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        try{
            $setting->save();
            return redirect()->back()->with('success','You have successfully added setting !');
        }catch (Exception $e){
            return redirect()->back()->with('error','Error ! Database');
        }
    }

    public function getEditSetting($setting_id)
    {
        $setting = Setting::find($setting_id);
        if(!isset($setting)){
           return redirect()->back()->with('error','Setting is not exist !');
        }
        $response = [
            'title'=>'Edit setting'.$setting->key_setting
        ];
        $response['setting'] = $setting;
        return view('admin.setting.edit',$response);
    }

    public function postEditSetting(SettingRequest $request,$setting_id)
    {
        $setting = Setting::find($setting_id);
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        try{
            $setting->save();
            return redirect()->back()->with('success','You are successfully fixed setting !');
        }catch (Exception $e){
            return redirect()->back()->with('error','Error ! Database');
        }

    }

    public function deleteSetting($setting_id)
    {
        $setting = Setting::find($setting_id);
        if(!isset($setting)){
            return redirect()->back()->with('error','Setting is not exist !');
        }
        $key_setting = $setting->key_setting;
        try{
            $setting->delete();
            return redirect()->back()->with('success','You have deleted'.$key_setting.' successfully !');
        }catch (Exception $e){
            return redirect()->back()->with('error','Error ! Database');
        }
    }
}
