<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/{another}','HomeController@index')->where(['another' => '[a-z0-9\-]+'])->name('home');

Route::get('/','HomeController@index')->name('home');
Route::get('/404','HomeController@error404')->name('404');

Route::get('/video/{title_slug}/{video_id}.html','ChildPageController@showVideo')->name('showVideo');
Route::get('/instruction','HomeController@instructionPublic')->name('instructionPublic');
Route::get('/instruction-private','HomeController@instructionPrivate')->name('instructionPrivate');

Route::get('/download-public','PageController@getPublicVideo')->name('getPublicVideo');
Route::post('/download-public','PageController@postPublicVideo')->name('postPublicVideo');

Route::get('/download-private','PageController@getPrivateVideo')->name('getPrivateVideo');
Route::post('/download-private','PageController@postPrivateVideo')->name('postPrivateVideo');

Route::get('/find-id','PageController@getFindId')->name('getFindId');
Route::post('/find-id','PageController@postFindId')->name('postFindId');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){
    Route::get('/','AdminController@index')->name('admin-home');

    Route::post('/image-upload', 'ArticleController@doHandleImage')->name('imageUpload');
    //Account
    Route::get('/list-user','UserController@listUser')->name('listUser');
    Route::get('/add-user','UserController@getAddUser')->name('getAddUser');
    Route::post('/add-user','UserController@postAddUser')->name('postAddUser');
    Route::get('/edit-user/{setting_id}','UserController@getEditUser')->name('getEditUser');
    Route::post('/edit-user/{setting_id}','UserController@postEditUser')->name('postEditUser');
    Route::get('/delete-user/{setting_id}','UserController@deleteUser')->name('deleteUser');

    //Setting
    Route::get('/list-setting-domain','SettingController@listSettingDomain')->name('listSettingDomain');
    Route::get('/add-setting-domain','SettingController@getAddSettingDomain')->name('getAddSettingDomain');
    Route::post('/add-setting-domain','SettingController@postAddSettingDomain')->name('postAddSettingDomain');

    Route::get('/list-setting-index','SettingController@listSettingIndex')->name('listSettingIndex');
    Route::get('/add-setting-index','SettingController@getAddSettingIndex')->name('getAddSettingIndex');
    Route::post('/add-setting-index','SettingController@postAddSettingIndex')->name('postAddSettingIndex');

    Route::get('/list-setting-view','SettingController@listSettingView')->name('listSettingView');
    Route::get('/add-setting-view','SettingController@getAddSettingView')->name('getAddSettingView');
    Route::post('/add-setting-view','SettingController@postAddSettingView')->name('postAddSettingView');

    Route::get('/list-setting-keyword','SettingController@listSettingKeyword')->name('listSettingKeyword');
    Route::get('/add-setting-keyword','SettingController@getAddSettingKeyword')->name('getAddSettingKeyword');
    Route::post('/add-setting-keyword','SettingController@postAddSettingKeyword')->name('postAddSettingKeyword');

    Route::get('/edit-setting/{setting_id}','SettingController@getEditSetting')->name('getEditSetting');
    Route::post('/edit-setting/{setting_id}','SettingController@postEditSetting')->name('postEditSetting');
    Route::get('/delete-setting/{setting_id}','SettingController@deleteSetting')->name('deleteSetting');
    //Permission
    Route::get('/list-permission','PermissionController@listPermission')->name('listPermission');
    Route::get('/add-permission','PermissionController@getAddPermission')->name('getAddPermission');
    Route::post('/add-permission','PermissionController@postAddPermission')->name('postAddPermission');
    Route::get('/edit-permission/{permission_id}','PermissionController@getEditPermission')->name('getEditPermission');
    Route::post('/edit-permission/{permission_id}','PermissionController@postEditPermission')->name('postEditPermission');
    Route::get('/delete-permission/{permission_id}','PermissionController@deletePermission')->name('deletePermission');

    //Article
    Route::get('/list-article','ArticleController@listArticle')->name('listArticle');
    Route::get('/add-article','ArticleController@getAddArticle')->name('getAddArticle');
    Route::post('/add-article','ArticleController@postAddArticle')->name('postAddArticle');
    Route::get('/edit-article/{article_id}','ArticleController@getEditArticle')->name('getEditArticle');
    Route::post('/edit-article/{article_id}','ArticleController@postEditArticle')->name('postEditArticle');
    Route::get('/delete-article/{article_id}','ArticleController@deleteArticle')->name('deleteArticle');

    //Auto article
    Route::get('/list-auto-article','AutoArticleController@listAutoArticle')->name('listAutoArticle');
    Route::get('/add-auto-article','AutoArticleController@getAddAutoArticle')->name('getAddAutoArticle');
    Route::post('/add-auto-article','AutoArticleController@postAddAutoArticle')->name('postAddAutoArticle');
    Route::get('/edit-auto-article/{autoArticle_id}','AutoArticleController@getEditAutoArticle')->name('getEditAutoArticle');
    Route::post('/edit-auto-article/{autoArticle_id}','AutoArticleController@postEditAutoArticle')->name('postEditAutoArticle');
    Route::get('/delete-auto-article/{autoArticle_id}','AutoArticleController@deleteAutoArticle')->name('deleteAutoArticle');
});


Route::get('/login','AdminController@getLogin')->name('getLogin');
Route::post('/login','AdminController@postLogin')->name('postLogin');
Route::get('/logout','AdminController@logout')->name('logout');

Route::get('/test','HomeController@test');

