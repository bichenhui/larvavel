<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
	//加载模板页面
	public function edit($name){
		//测试 hd_config函数
//		dd (hd_config ('update.size'));
//		dd ($name);
		//获取配置项数据
		//firstOrNew手册位置: Eloquent ORM-->快读入门
		$config=Config::firstOrNew(
			['name'=>$name]
		);
//		dd ($config['data']);
		return view ('admin.config.edit_'.$name,compact ('name','config'));
	}
	//添加  编辑/更新
	public function update($name,Request $request){
//		dd ($name);
//		dd ($request);
//			updateOrCreate 执行更新或者添加
		//updateOrCreate手册位置: Eloquent ORM-->快读入门
		$res=Config::updateOrCreate(
			['name'=>$name],//查询条件
			//注意:$request->all()是数组(以前是这样转换成json格式 json_encode ($request->all ())),直接写入数据表报错
			//需要借助模型属性 cates  //应该被转换成原生类型的属性
			//	//cates 属性手册: Eloquent ORM--修改器
			['name'=>$name,'data'=>$request->all ()]//更新或者添加的数据
		);
		//修改env中的 数据
		hd_edit_env($request->all());
//		dd ($res);
		//跳转 页面
		return back ()->with ('success','编辑成功');
	}
}
