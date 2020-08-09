<?php

use Illuminate\Support\Facades\Route;

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
use \Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});
// 5. Eloquent模型追加新字段到返回值中。
Route::get('append', function(){
   return App\User::where('id', '<',10)->get();
});
// 4.helpers
Route::get('helpers', 'HelpersController@helpMethod');
// 3.Event这里调用
Route::get('event/{id}', 'EventController@OrderShippedEvent');

// 2.Collecttion 的用法
Route::get('collection', 'CollectionController@collectionMethed');

//1. controller
Route::get('user/{id}', 'UserController@show');

Route::get('test1', 'RouteController@test2');

Route::post('test2', 'RouteController@test2');

// 用input获取参数
Route::post('test3', 'RouteController@test3');

Route::post('json', 'RouteController@JsonResponse');

Route::post('boolean', 'RouteController@BooleanResponse');
Route::post('except', 'RouteController@ExceptResponse');

