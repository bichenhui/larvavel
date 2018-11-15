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

//Route::get('/', function () {
//    return view('welcome');
//});

//网站首页
//Route::get ('/','HomeController@index')->name ('home');

Route::get ('/','Home\HomeController@index')->name ('home');

//用户管理
Route::get ('/register','UserController@register')->name ('regiter');
Route::get ('/login','UserController@login')->name ('login');
Route::post ('register','UserController@store')->name ('register');
Route::post ('/login','UserController@loginForm')->name ('login');
Route::get('/logout','UserController@logout')->name('logout');
//重置密码
Route::get ('/password_reset','UserController@passwordReset')->name('password_reset');
//重置密码提交
Route::post ('/password_reset','UserController@passwordResetForm')->name ('password_reset');



//工具类
Route::any ('/code/send','Util\CodeController@send')->name ('code.send');

//后台理由  admin.auth 如果出现这个错误说明 app-http-Kernel.php 没有添加'admin.auth'=>AdminAuthMiddleware::class
//数据库密码 secret  'middleware'=>['admin.auth'] 监听作用 所以在中间件中做判断是不是管理员和是否登录
Route::group (['middleware'=>['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function (){
	//prefix'=>'admin' 把'middleware'=>['admin.auth'缩写的方式
		Route::get ('index','IndexController@index')->name ('index');
});
