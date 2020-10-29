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

/**
 * @author  ZhangJinJIn <github.com/YetiSui>
 */
Route::prefix('supadmin')->namespace("SupAdmin")->group(function () {
    Route::post('adddevice', 'EquipmentController@addDevice'); //新增设备
    Route::get('searchnew', 'EquipmentController@searchNew'); //查询设备
    Route::get('goback', 'EquipmentController@goBack'); //回显
    Route::post('exitnew', 'EquipmentController@exitNew'); //修改设备信息
    Route::post('rmnew', 'EquipmentController@rmNew'); //删除设备信息
    Route::get('shownew', 'EquipmentController@showNew'); //设备管理页面展示
    });