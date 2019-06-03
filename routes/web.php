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
Route::get('/', function () {
    return view('welcome');
});
//Danh sách
Route::get('index', ['as'=>'danhsach', 'uses'=>'Index@getThongtin']);
//Thêm
Route::get('them', ['as'=>'them', 'uses'=>'Index@getThem']);
Route::post('them', ['as'=>'them', 'uses'=>'Index@postThem']);
//Sửa
Route::get('sua/{id}',['as'=>'sua', 'uses'=>'Index@getSua']);
Route::post('sua/{id}',['as'=>'sua', 'uses'=>'Index@postSua']);
//Xoá
Route::get('xoa/{id}',['as'=>'xoa', 'uses'=>'Index@getXoa']);

