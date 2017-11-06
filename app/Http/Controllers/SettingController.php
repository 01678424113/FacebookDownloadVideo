<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use Mockery\Exception;
use Session;

class SettingController extends Controller
{
    //Setting domain
    public function listSettingDomain(Request $request)
    {
        $response = [
            'title' => 'Setting domain'
        ];
        $settings_query = Setting::select([
            'id',
            'setting_page',
            'key_setting',
            'value_setting',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at'
        ])->where('setting_page', 'domain');

        $response['settings'] = $settings_query->paginate(20);
        return view('admin.setting.list-index', $response);
    }

    public function getAddSettingDomain()
    {
        $response = [
            'title' => 'Add setting domain'
        ];
        return view('admin.setting.add-domain', $response);
    }

    public function postAddSettingDomain(SettingRequest $request)
    {
        $setting = new Setting();
        $setting->setting_page = $request->setting_page;
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        $setting->created_by = Session::get('user_id');
        $setting->created_at = round(microtime(true));
        try {
            $setting->save();
            return redirect()->route('listSettingDomain')->with('success', 'You have successfully added setting domain !');
        } catch (Exception $e) {
            return redirect()->route('listSettingDomain')->with('error', 'Error ! Database');
        }
    }

    //Setting index
    public function listSettingIndex(Request $request)
    {
        $response = [
            'title' => 'Setting index'
        ];
        $settings_query = Setting::select([
            'id',
            'setting_page',
            'key_setting',
            'value_setting',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at'
        ])->where('setting_page', 'index');
        if ($request->has('key_setting_search') && $request->key_setting_search != "") {
            $settings_query->where('key_setting', 'LIKE', '%' . $request->key_setting_search . '%');
        }
        $response['settings'] = $settings_query->paginate(20);
        return view('admin.setting.list-index', $response);
    }

    public function getAddSettingIndex()
    {
        $response = [
            'title' => 'Add setting index'
        ];
        return view('admin.setting.add-index', $response);
    }

    public function postAddSettingIndex(SettingRequest $request)
    {
        $setting = new Setting();
        $setting->setting_page = $request->setting_page;
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        $setting->created_by = Session::get('user_id');
        $setting->created_at = round(microtime(true));
        try {
            $setting->save();
            return redirect()->route('listSettingIndex')->with('success', 'You have successfully added setting index !');
        } catch (Exception $e) {
            return redirect()->route('listSettingIndex')->with('error', 'Error ! Database');
        }
    }

    //Setting view

    public function listSettingView(Request $request)
    {
        $response = [
            'title' => 'Setting view'
        ];
        $settings_query = Setting::select([
            'id',
            'setting_page',
            'key_setting',
            'value_setting',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at'
        ])->where('setting_page', 'view');
        if ($request->has('key_setting_search') && $request->key_setting_search != "") {
            $settings_query->where('key_setting', 'LIKE', '%' . $request->key_setting_search . '%');
        }
        $response['settings'] = $settings_query->paginate(20);
        return view('admin.setting.list-view', $response);
    }

    public function getAddSettingView()
    {
        $response = [
            'title' => 'Add setting view'
        ];
        return view('admin.setting.add-view', $response);
    }

    public function postAddSettingView(SettingRequest $request)
    {
        $setting = new Setting();
        $setting->setting_page = $request->setting_page;
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        $setting->created_by = Session::get('user_id');
        $setting->created_at = round(microtime(true));
        try {
            $setting->save();
            return redirect()->route('listSettingView')->with('success', 'You have successfully added setting view !');
        } catch (Exception $e) {
            return redirect()->route('listSettingView')->with('error', 'Error ! Database');
        }
    }

    //Setting keyword

    public function listSettingKeyword(Request $request)
    {
        $response = [
            'title' => 'Setting keyword'
        ];
        $settings_query = Setting::select([
            'id',
            'setting_page',
            'key_setting',
            'value_setting',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at'
        ])->where('setting_page', 'keyword');
        if ($request->has('key_setting_search') && $request->key_setting_search != "") {
            $settings_query->where('key_setting', 'LIKE', '%' . $request->key_setting_search . '%');
        }
        $response['settings'] = $settings_query->paginate(20);
        return view('admin.setting.list-keyword', $response);
    }

    public function getAddSettingKeyword()
    {
        $response = [
            'title' => 'Add setting keyword'
        ];
        return view('admin.setting.add-keyword', $response);
    }

    public function postAddSettingKeyword(SettingRequest $request)
    {
        $setting = new Setting();
        $setting->setting_page = $request->setting_page;
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        $setting->created_by = Session::get('user_id');
        $setting->created_at = round(microtime(true));
        try {
            $setting->save();
            return redirect()->route('listSettingKeyword')->with('success', 'You have successfully added setting keyword !');
        } catch (Exception $e) {
            return redirect()->route('listSettingKeyword')->with('error', 'Error ! Database');
        }
    }

    //Dùng chung

    public function getEditSetting($setting_id)
    {
        $setting = Setting::find($setting_id);
        if (!isset($setting)) {
            return redirect()->back()->with('error', 'Setting is not exist !');
        }
        $response = [
            'title' => 'Edit setting: ' . $setting->key_setting
        ];
        switch ($setting->setting_page){
            case 'index':
                $response['route_return'] = "list-setting-index";
                break;
            case 'view':
                $response['route_return'] = "list-setting-view";
                break;
            case 'domain':
                $response['route_return'] = "list-setting-domain";
                break;
            case 'keyword':
                $response['route_return'] = "list-setting-keyword";
                break;
        }
        $response['setting'] = $setting;
        return view('admin.setting.edit', $response);
    }

    public function postEditSetting(SettingRequest $request, $setting_id)
    {
        $setting = Setting::find($setting_id);
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        $setting->updated_by = Session::get('user_id');
        $setting->updated_at = round(microtime(true));
        try {
            $setting->save();
            return redirect()->back()->with('success', 'You are successfully fixed setting !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error ! Database');
        }

    }

    public function deleteSetting($setting_id)
    {
        $setting = Setting::find($setting_id);
        if (!isset($setting)) {
            return redirect()->back()->with('error', 'Setting is not exist !');
        }
        $key_setting = $setting->key_setting;
        try {
            $setting->delete();
            return redirect()->back()->with('success', 'You have deleted successfully !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error ! Database');
        }
    }
}
