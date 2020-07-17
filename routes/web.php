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

Route::get('/', function () {
    return view('welcome');
});
Route::get('user/{id}', 'UserController@show');

Route::get('test1', function(\Illuminate\Http\Request $request){
    dump($request->path());
    dump($request->url());
    dump($request->fullUrl());
    dump($request->method());
    $all = $request->all();
    dump($all);
   $input = $request->input('input');
   dump($input);
});

Route::post('test2', function(){
   dump(1111);
    // dump($request->url());
    // dump($request->fullUrl());
    // dump($request->method());
    // $all = $request->all();
    // dump($all);
    // $input = $request->input('input');
    // dump($input);
});
