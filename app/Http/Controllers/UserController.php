<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	//登录
    public function login(){
		return view ('user.login');
	}
	//注册
	public function register(){
		return view ('user.register');
	}
	//用户提交注册
	public function store(UserRequest $request){
//		dd ($request->all ()); // 如果模板没有给name =“” 就会打印不出来
		$data=$request->all ();
//		dd ($data);
		$data['password']=bcrypt ($data['password']);
//		dd ($data);
		User::create($data);
		//提示并且跳转
		return redirect()->route('login')->with('success','注册成功');
	}
}
