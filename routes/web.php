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
	//点赞 取消点赞
	Route::get ('zan/make','ZanColltroller@make')->name ('zan.make');
	//收藏 取消收藏
	Route::get ('collect/make','CollectController@make')->name ('collect.make');
	Route::get ('search','HomeController@search')->name ('search');
});
//会员中心
Route::group (['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function (){
	//用户管理
	Route::resource ('user','UserController');
	Route::get ('attention/{user}','UserController@attention')->name ('attention');
	//我的粉丝
	Route::get ('my_fans/{user}','UserController@myFans')->name ('my_fans');
	Route::get ('my_following/{user}','UserController@myFollowing')->name ('my_following');
	//我的收藏
	Route::get ('my_collect/{user}','UserController@collect')->name ('my_collect');
	//我的点赞
	Route::get ('my_zan/{user}','UserController@myZan')->name ('my_zan');
	//我的所有通知
	Route::get ('notify/{user}','NotifyController@index')->name ('notify');
	////标记已读
	Route::get ('notify/show/{notify}','NotifyController@show')->name ('notify.show');
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
		//配置项
	Route::get ('config/edit/{name}','ConfigController@edit')->name ('config.edit');
	Route::post ('config/update/{name}','ConfigController@update')->name ('config.update');

});

Route::resource ('photo','Photo\PhotoController');
//微信管理

	Route::group (['prefix'=>'wechat','namespace'=>'Wechat','as'=>'wechat.'],function(){
		//菜单管理
		Route::resource ('button','ButtonController');
		Route::get ('button/push/{button}','ButtonController@push')->name ('button.push');
		//微信管理
		Route::any ('api/handler','ApiController@handler')->name ('api.handler');
		//文本回复
		Route::resource ('respones_text','ResponesTextController');
		//图文回复
		Route::resource ('response_news','ResponseNewsController');
		//基本回复  关注回复以及默认回复
		Route::resource ('response_base','ResponseBaseController');
	});

Route::group (['prefix'=>'role','namespace'=>'Role','as'=>'role.'],function(){
	//权限列表
		Route::get ('permission/index','PermissionsController@index')->name ('permission.index');
	//清除权限缓存
		Route::get ('permission/forget_permission_cache','PermissionsController@forgetPermissionCache')->name ('permission.forget_permission_cache');
	//角色管理的资源路由
		Route::resource ('role','RoleController');
	//设置角色权限
	Route::post('role/set_role_permission/{role}','RoleController@setRolePermission')->name('role.set_role_permission');
	Route::get ('user/index','UserController@index')->name ('user.index');
	Route::get ('user/user_set_role_create/{user}','UserController@userSetRoleCreate')->name ('user.user_set_role_create');
	Route::post ('user/user_set_role_store/{user}','UserController@userSetRoleStore')->name ('user.user_set_role_store');
});
