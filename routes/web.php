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

Route::get('/','HomeController@index')->name('home');

Route::get('/video/{title_slug}/{video_id}','PageController@showVideo')->name('showVideo');
Route::get('/instruction','HomeController@instructionPublic')->name('instructionPublic');
Route::get('/instruction-private','HomeController@instructionPrivate')->name('instructionPrivate');

Route::get('/download-public','PageController@getPublicVideo')->name('getPublicVideo');
Route::post('/download-public','PageController@postPublicVideo')->name('postPublicVideo');

Route::get('/download-private','PageController@getPrivateVideo')->name('getPrivateVideo');
Route::post('/download-private','PageController@postPrivateVideo')->name('postPrivateVideo');

Route::get('/find-id','PageController@getFindId')->name('getFindId');
Route::post('/find-id','PageController@postFindId')->name('postFindId');

Route::get('/test','HomeController@test')->name('test');


Route::post('/image-upload', 'ArticleController@doHandleImage')->name('imageUpload');


Route::group(['prefix'=>'admin'],function (){
    Route::get('/','AdminController@index')->name('admin-home');

    //Setting
    Route::get('/list-setting','SettingController@listSetting')->name('listSetting');
    Route::get('/add-setting','SettingController@getAddSetting')->name('getAddSetting');
    Route::post('/add-setting','SettingController@postAddSetting')->name('postAddSetting');
    Route::get('/edit-setting/{setting_id}','SettingController@getEditSetting')->name('getEditSetting');
    Route::post('/edit-setting/{setting_id}','SettingController@postEditSetting')->name('postEditSetting');
    Route::get('/delete-setting/{setting_id}','SettingController@deleteSetting')->name('deleteSetting');

    //Article
    Route::get('/list-article','ArticleController@listArticle')->name('listArticle');
    Route::get('/add-article','ArticleController@getAddArticle')->name('getAddArticle');
    Route::post('/add-article','ArticleController@postAddArticle')->name('postAddArticle');
    Route::get('/edit-article/{article_id}','ArticleController@getEditArticle')->name('getEditArticle');
    Route::post('/edit-article/{article_id}','ArticleController@postEditArticle')->name('postEditArticle');
    Route::get('/delete-article/{article_id}','ArticleController@deleteArticle')->name('deleteArticle');
});