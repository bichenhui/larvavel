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
//前台
Route::group (['prefix'=>'home','namespace'=>'Home','as'=>'home.'],function (){
	Route::get ('/','HomeController@index')->name ('home');
	//；文章管理
	Route::resource ('article','ArticleController');
	//用户评论
	Route::resource ('comment','CommentController');
});
//会员中心
Route::group (['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function (){
	//用户管理
	Route::resource ('user','UserController');
	Route::get ('attention/{user}','UserController@attention')->name ('attention');
	//我的粉丝
	Route::get ('my_fans/{user}','UserController@myFans')->name ('my_fans');
	Route::get ('my_following/{user}','UserController@myFollowing')->name ('my_following');
});
//用户管理
//注册页面
Route::get ('/register','UserController@register')->name ('regiter');
//登录页面
Route::get ('/login','UserController@login')->name ('login');
//用户提交注册
Route::post ('register','UserController@store')->name ('register');
//登录提交
Route::post ('/login','UserController@loginForm')->name ('login');
//注销登录
Route::get('/logout','UserController@logout')->name('logout');
//重置密码
Route::get ('/password_reset','UserController@passwordReset')->name('password_reset');
//重置密码提交
Route::post ('/password_reset','UserController@passwordResetForm')->name ('password_reset');



//工具类
Route::group (['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function () {
	//发送验证码
	Route::any ('/code/send', 'CodeController@send')->name ('code.send');
	//上传
	Route::any ('/upload', 'UploadController@uploader')->name ('upload');
	Route::any ('/filesLists', 'UploadController@filesLists')->name ('filesLists');
});
//后台理由  admin.auth 如果出现这个错误说明 app-http-Kernel.php 没有添加'admin.auth'=>AdminAuthMiddleware::class
//数据库密码 secret  'middleware'=>['admin.auth'] 监听作用 所以在中间件中做判断是不是管理员和是否登录
//'admin.auth' 在Kernel.php 里面调用注册 才能使用
Route::group (['middleware'=>['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function (){
	//prefix'=>'admin' 把'middleware'=>['admin.auth'缩写的方式
		Route::get ('index','IndexController@index')->name ('index');
		//创建模型同时创建迁移和工厂
//	rtisan make:model --migration --factory  Models/Category
	//创建控制器制定模型
	//artisan make:controller --model=Models/Category  Admin/CategoryController
		Route::resource ('category','CategoryController');
});
