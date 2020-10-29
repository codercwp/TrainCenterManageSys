<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test','TestController@test');

Route::prefix('supadmin')->namespace('SupAdmin')->group(function (){
    /**
     * 唐盛友
     */
    Route::get('getlaboperationrecords','MainpageController@getLabOperationRecords');//运行实验室记录展示
    Route::get('getlab','MainpageController@getLab');//下拉框回显所有实验室
    Route::get('getlaball','MainpageController@getLabAll');//查看详情 显示所有的数据
    Route::get('getlaballinfo','MainpageController@getLabAllInfo');//查看详情 显示所有的数据
    Route::get('select','MainpageController@Select');//搜索

    /*
     * 丁晨
     */
    Route::get('showinfo','LocationController@showInfo');//场地管理页面展示
    Route::post('addinfo','LocationController@addInfo');//新增场地
    Route::get('findinfo','LocationController@findInfo');//查询
    Route::get('returninfo','LocationController@returnInfo');//回显修改信息
    Route::post('exitinfo','LocationController@exitInfo');//修改信息
    Route::get('rminfo','LocationController@rmInfo');//删除

});
