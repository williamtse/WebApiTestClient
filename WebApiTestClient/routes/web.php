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
use App\Api;
Route::get('/', function () {
    $apis = Api::all();
    return view('welcome',['apis'=>$apis]);
});

Route::get('/api/{id}',function($id){
    $apis = Api::all();
    $api = Api::find($id);
    return view('api',['apis'=>$apis,'api'=>$api]);
});


