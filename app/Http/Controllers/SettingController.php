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

    //Setting keyword 1

    public function listSettingKeyword1(Request $request)
    {
        $response = [
            'title' => 'Setting keyword 1'
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
        ])->where('setting_page', 'keyword_1');
        if ($request->has('key_setting_search') && $request->key_setting_search != "") {
            $settings_query->where('key_setting', 'LIKE', '%' . $request->key_setting_search . '%');
        }
        $response['settings'] = $settings_query->paginate(20);
        return view('admin.setting.list-keyword-1', $response);
    }

    public function getAddSettingKeyword1()
    {
        $response = [
            'title' => 'Add setting keyword 1 '
        ];
        return view('admin.setting.add-keyword-1', $response);
    }

    public function postAddSettingKeyword1(SettingRequest $request)
    {
        $setting = new Setting();
        $setting->setting_page = $request->setting_page;
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        $setting->created_by = Session::get('user_id');
        $setting->created_at = round(microtime(true));
        try {
            $setting->save();
            return redirect()->route('listSettingKeyword1')->with('success', 'You have successfully added setting keyword 1 !');
        } catch (Exception $e) {
            return redirect()->route('listSettingKeyword1')->with('error', 'Error ! Database');
        }
    }

    //Setting keyword 2

    public function listSettingKeyword2(Request $request)
    {
        $response = [
            'title' => 'Setting keyword 2'
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
        ])->where('setting_page', 'keyword_2');
        if ($request->has('key_setting_search') && $request->key_setting_search != "") {
            $settings_query->where('key_setting', 'LIKE', '%' . $request->key_setting_search . '%');
        }
        $response['settings'] = $settings_query->paginate(20);
        return view('admin.setting.list-keyword-2', $response);
    }

    public function getAddSettingKeyword2()
    {
        $response = [
            'title' => 'Add setting keyword 2'
        ];
        return view('admin.setting.add-keyword-2', $response);
    }

    public function postAddSettingKeyword2(SettingRequest $request)
    {
        $setting = new Setting();
        $setting->setting_page = $request->setting_page;
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        $setting->created_by = Session::get('user_id');
        $setting->created_at = round(microtime(true));
        try {
            $setting->save();
            return redirect()->route('listSettingKeyword2')->with('success', 'You have successfully added setting keyword 2 !');
        } catch (Exception $e) {
            return redirect()->route('listSettingKeyword2')->with('error', 'Error ! Database');
        }
    }

    //Setting keyword link

    public function listSettingKeywordLink(Request $request)
    {
        $response = [
            'title' => 'Setting keyword link'
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
        ])->where('setting_page', 'keyword_link');
        if ($request->has('key_setting_search') && $request->key_setting_search != "") {
            $settings_query->where('key_setting', 'LIKE', '%' . $request->key_setting_search . '%');
        }
        $response['settings'] = $settings_query->paginate(20);
        return view('admin.setting.list-keyword-link', $response);
    }

    public function getAddSettingKeywordLink()
    {
        $response = [
            'title' => 'Add setting keyword link'
        ];
        return view('admin.setting.add-keyword-link', $response);
    }

    public function postAddSettingKeywordLink(SettingRequest $request)
    {
        $setting = new Setting();
        $setting->setting_page = $request->setting_page;
        $setting->key_setting = $request->key_setting;
        $setting->value_setting = $request->value_setting;
        $setting->created_by = Session::get('user_id');
        $setting->created_at = round(microtime(true));
        try {
            $setting->save();
            return redirect()->route('listSettingKeywordLink')->with('success', 'You have successfully added setting keyword link !');
        } catch (Exception $e) {
            return redirect()->route('listSettingKeywordLink')->with('error', 'Error ! Database');
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
