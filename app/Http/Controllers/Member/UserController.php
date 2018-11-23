<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function __construct ()
	{
		$this->middleware('auth',[
			'only'=>['edit','update','attention']
		]);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
//    	dd($user);
		//获取当前用户发表的文章
		$articles=Article::latest()->where('user_id',$user->id)->paginate(5);
		return view ('member.user.show',compact ('user','articles'));
    }


    public function edit(User $user,Request $request)
    {
        //调用策略
		$this->authorize ('isMine',$user);
		//接受type类型
		$type=$request->query ('type');
		return view ('member.user.edit_'.$type,compact ('user'));
    }
    public function update(Request $request, User $user)
    {

    	$data=$request->all ();
		//调用策略

		$this->authorize ('isMine',$user);

		$this->validate($request,[
			'password'=>'sometimes|required|min:3|confirmed',
			'name'=>'sometimes|required',
		], ['name.required'=>'请输入昵称',
			'password.min'=>'密码不能少于3位',
			'password.required'=>'请输入密码',
			'password.confirmed'=>'密码不能重复',

		]);
		//密码加密
		if ($request->password){
			$data['password']=bcrypt ($data['password']);
		}
//		dd ($data);
		//执行更新
		$user->update ($data);
		return back ()->with ('success','更新成功');
    }

    public function destroy(User $user)
    {
        //
    }
    public function attention(User $user){
		//关注 取消关注
		//这里user 被关注着
//		dd ($user->toArray ());
//		toggle 关注 取消关注
		$user->fans ()->toggle(auth ()->user ());
		return back ();
	}
	//我的粉丝
	public function myFans(User $user){
		//获取$user用户粉丝
		$fans=$user->fans ()->paginate (9);
//		dd ($fans);
    	return view ('member.user.my_fans',compact ('user','fans'));
	}
	//我关注的人
	public function myFollowing(User $user){
		$followings=$user->following()->paginate(9);
		return view ('member.user.my_following',compact ('user','followings'));
	}
}
