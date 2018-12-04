<?php
namespace App\Servies;

use App\Models\Keyword;
use App\Models\Rule;
use Houdunwang\WeChat\WeChat;
use Illuminate\Support\Facades\Validator;

class WechatService{

	public function __construct ()
	{
      //微信通信绑定
		$config=config('hd_wechat');
//		dd ($config);
		WeChat::config ($config);
		WeChat::valid();
	}
	//加载规则试图文件
	public function ruleView($rule_id=0){
//		dd ($rule_id);
		$rule=Rule::find($rule_id);
//		dd ($rule);
		$ruleData=[
			'name'=>$rule ? $rule['name'] : '',
			'keywords'=>$rule ? $rule->keyword()->select('key')->get()->toArray():[],
		];
//		dd ($ruleData);
		return view ('wechat.layouts.rule',compact ('ruleData'));
	}
	//添加数据
	public function ruleStore($type){
//		dd (request ()->all ());
		$post=request ()->all ();
//		dd ($post);
//		$post=request ()->rule;
//		dd ($post);
//
		//把 post 提交来的 rule 数据转为数组格式
		$rule=json_decode ($post['rule'],true);
//		dd ($rule);
		//执行规则表的添加
		\Validator::make ($rule,[
			'name'=>'required'
		],[
			'name.required'=>'规则名不能为空'
		])->validate ();
		//添加数据库
		$ruleModel=Rule::create (['name'=>$rule['name'],'type'=>$type]);
//		dd ($ruleModel);
		//关键词表添加
		foreach ($rule['keywords'] as $value){
			Keyword::create([
				'rule_id'=>$ruleModel['id'],
				'key'=>$value['key']
							]);
		}
		//最后把规则对象返回
		return $ruleModel;
	}
	//编辑数据
	public function ruleUpdate($rule_id){
//		dd ($rule_id);
		$rule = Rule::find($rule_id);
//		dd ($rule);
		$post = request()->all();
		$ruleData = json_decode($post['rule'],true);
		$rule->update(['name'=>$ruleData['name']]);
		//关键词表编辑
		//原来的关键词删除
		$rule->keyword()->delete();
		foreach ($ruleData['keywords'] as $value){
			Keyword::create([
								'rule_id'=>$rule_id,
								'key'=>$value['key']
							]);
		}
	}
}