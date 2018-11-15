<?php

namespace App\Http\Controllers\Util;

use App\Notifications\RegisterNotify;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function send(Request $request){
		//获取所有验证码
//		dd ($request->all ());
//		dd($request->username);只抓取username这一项数据
		//随机四位验证码
		$code=$this->random ();

		//发送验证码
		$user=User::firstOrNew(['email'=>$request->username]);//user模型对象
//		dd ($user); 显示出好多数据 只要邮箱的数据所以要进行下一步$user->toArray()
//		dd ($user->toArray());
		//需要创建通知类:php artisan make:notification  RegisterNotify

		$user->notify(new RegisterNotify($code));
		//将验证码存入session中
		session()->put('code',$code);
		//返回数据
		return ['code'=>1,'message'=>'验证码提交成功'];

	}
	//这个方法是随机获取四个验证码
	private function random($len=4){
    	$str='';
    	for ($i=0;$i<$len;$i++){
			$str .=mt_rand (0,9);
		}
//		dd ($str);
		return $str;
	}
}
