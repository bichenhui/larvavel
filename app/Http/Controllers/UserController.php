<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct ()
	{
		//调用中间件，保护登录注册（已经登录用户不允许再访问登录注册）
		$this->middleware('guest',[
			'only'=>['login','loginForm','register','store','passwordReset','passwordResetForm'],
		]);
	}

	//登录
    public function login(){
		return view ('user.login');
	}
	//登陆提交
	public function loginForm(Request $request){
//    	dd ($request->all ()); 可以打印
		//验证邮箱 密码
    	$this->validate ($request,[
    		'email'=>'email',
			'password'=>'required|min:3'
		],[
			'email.email'=>'请输入邮箱',
			'password.required'=>'请输入密码',
			'password.min'=>'密码不得少于3位'
		]);
// 执行登录  手册 用户认证  手动认证用户
		$credentials = $request->only('email', 'password');
//		如果验证成功，该attempt方法将返回true。否则，false将被退回。
		if (\Auth::attempt ($credentials)){
			return redirect ()->route ('home')->with ('success','登录成功');
		}
			return redirect ()->back ()->with ('danger','用户名和密码不正确');


	}
	//注册
	public function register(){
		return view ('user.register');
	}
	//注册登录
	public function logout(){
		\Auth::logout ();
		return redirect ()->route ('home');
	}
	//用户提交注册
	public function store(RegisterRequest $request){
//		dd ($request->all ()); // 如果模板没有给name =“” 就会打印不出来
		$data=$request->all ();
//		dd ($data);
		$data['password']=bcrypt ($data['password']);
//		dd ($data);
		User::create($data);
		//提示并且跳转
		return redirect()->route('login')->with('success','注册成功');
	}

	//重置密码
	public function passwordReset(){
    	return view ('user.password_reset');
	}
//重置密码提交
	public function passwordResetForm(PasswordResetRequest $request){
		//根据用户提交来的邮箱去查找数据
		$user = User::where('email',$request->email)->first();
		if($user){
			//更新密码
			$user->password = bcrypt($request->password);
			$user->save();
			return redirect()->route('login')->with('success','密码重置成功');
		}
		return redirect()->back()->with('danger','该邮箱未注册');
	}

}
