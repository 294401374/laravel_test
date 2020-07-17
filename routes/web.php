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
Route::get('user/{id}', 'UserController@show');

Route::get('test1', function(\Illuminate\Http\Request $request){
    
    $query = Request::query();
    dump(Request::query('query_name1'));
    dd($query);
    
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

// 用input获取参数
Route::post('test3', function(\Illuminate\Http\Request $request){
    // $all = $request->all();
    $input = Request::input();
    // dd($input);
    $input = Request::input('array.1.name');
    dump($input);
});

Route::post('json', function(Request $request){
    $name = $request->input('json.name');
    dump($name);
    $input = $request->input();
    dd($input['json']);
});

Route::post('boolean', function(Request $request){
    $bool = $request->boolean('bool');
    dd($bool);
});
Route::post('except', function(Request $request){
    $only = $request->only(['bool', 'false']);
    $except = $request->except('json');
    $fill = $request->filled('name');
    $miss = $request->missing("name");
    $name = $request->old('name');
    dump($name);
    dump($name);
    dump($miss);
    dump($fill);
    dump($except);
    dd($only);
});

