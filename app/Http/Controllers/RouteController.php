<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    //
    public function test1(Request $request)
    {
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
    }
    
    public function test2(Request $request)
    {
        dump(1111);
        dump($request->url());
        dump($request->fullUrl());
        dump($request->method());
        $all = $request->all();
        dump($all);
        $input = $request->input('input');
        dump($input);
    
    }
    
    public function test3(Request $request)
    {
        // $all = $request->all();
        $input = $request->input();
        dump($input);
        $input = $request->input('array.1.name');
        dump($input);
    }
    
    public function JsonResponse(Request $request)
    {
        $name = $request->input('json.name');
        dump($name);
        $input = $request->input();
        dd($input['json']);
    }
    
    public function BooleanResponse(Request $request)
    {
        $bool = $request->boolean('bool');
        dd($bool);
    
    }
    
    public function ExceptResponse(Request $request)
    {
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
    }
}
