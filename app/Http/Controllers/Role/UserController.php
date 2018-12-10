<?php

namespace App\Http\Controllers\Role;

use App\Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	//展示所有用户
	public function index(){
		//获取所有用户
		$users=User::paginate(10);
//		dd ($users);
		return view ('role.user.index',compact ('users'));
	}
	//展示用户设置角色模板
	public function userSetRoleCreate(User $user){
//		dd ($user);
		$roles=Role::all ();
//		dd ($roles);
		return view ('role.user.set_role',compact ('user','roles'));
	}
	//给 用户设置角色
	public function userSetRoleStore(User $user,Request $request){
//		dd (2);
//		dd ($request->all ());
//		dd ($user);
		$user->syncRoles($request->roles);
		return back ()->with ('success','设置成功');
	}
}
