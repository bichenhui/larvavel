<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Keyword;
use App\Models\ResponseBase;
use App\Models\Rule;
use App\Servies\WechatService;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
//微信后台接口配置 url 填写地址指向该方法
	//调用WechatService ,这个类中构造方法进行通信验证
	public function handler (WechatService $wechatService)
	{
		//协助测试 数据
//        $rule = Rule::find(14);
//        dd ($rule);
//        //获取所有对应的文本回复
//		$responesContent = json_decode($rule->responesText->pluck('content')->toArray()[0],true);
//		dd ($responseContent);
//        //从所有回复内容中每次随机一个
//        $content = array_random($responesContent)['content'];
//        dd($content);

		//测试获取对应图文数据
//        $rule = Rule::find(15);
//        dd ($rule);
//        dd(json_decode($rule->responseNews->toArray()[0]['data'],true));
//		dd ()
//        die;
//    	echo 3;
		//微信给我们服务器推送消息 post 方式推送消息
		//第一点:注意路由设置请求方法 any
		//第二点:post 请求必须伴随 csrf,需要社会 csrf 白名单
		//所有微信相关用法需要参考:https://www.kancloud.cn/houdunwang/wechat/325049

		//消息管理模块
		$instance =WeChat::instance('message');

		//====关注事件====//
		//判断是否是关注事件
		if ($instance->isSubscribeEvent())
		{
			$content = ResponseBase::find(1);
			//向用户回复消息
			return $instance->text($content['data']['subscribe']);
		}
		//消息管理模块

		//判断是否是文本消息
		if ($instance->isTextMsg ()) {
			//向用户回复消息
			//获取粉丝发送来的消息内容
			$content=$instance->Content;
//			file_put_contents ('dsd.php',2);
//			return $instance->text ('后盾人收到你的消息了...:' . $instance->Content);
			return $this->keyWordToFindResponse($instance,$content);
		}
		//======菜单事件=======//
        //消息管理模块
        $buttonInstance = WeChat::instance('button');
        //点击菜单拉取消息时的事件推送
        if ($buttonInstance->isClickEvent()) {
			//获取消息内容
			$message = $buttonInstance->getMessage();
			return $this->keyWordToFindResponse($instance,$message->EventKey);
			//向用户回复消息
//            return WeChat::instance('message')->text("点击了菜单,EventKey:{$message->EventKey}");
		}

	}
	public function keyWordToFindResponse($instance,$content){
		if ($keyword=Keyword::where('key',$content)->first()){
			//通过关键词模型关联 rule
			$rule=$keyword->rule;
			//如果能找到对应的关键词
			if($rule['type']=='text'){
				//文本消息
				//获取所有对应的文本回复
				$responseContent=json_decode ($rule->responesText->pluck('content')->toArray()[0],true);
				//从所有回复内容中每次随机一个
				$content=array_random ($responseContent)['content'];
				//回复粉丝
				return $instance->text($content);
			}elseif($rule['type']=='news'){
				//图文消息
				$news=json_decode ($rule->responseNews->toArray()[0]['data'],true);
				return $instance->news([$news]);
			}

		}
		//当匹配不到关键词的时候 执行默认回复
		$content = ResponseBase::find(1);
		return $instance->text($content['data']['default']);
	}
}
