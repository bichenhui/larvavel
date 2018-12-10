<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Button;
use App\Servies\WechatService;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ButtonController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin.auth',[
			'except'=>[],
		]);
	}

    public function index()
    {
    	$buttons=Button::latest()->paginate(1);
       return view ('wechat.button.index',compact ('buttons'));
    }


    public function create()
    {

        return view ('wechat.button.create');
    }


    public function store(Request $request)
    {
//    	dd ($request->all ());
        Button::create ($request->all ());
        return redirect ()->route ('wechat.button.index')->with ('success','菜单添加成功');
    }


    public function edit(Button $button)
    {
        return view ('wechat.button.edit',compact ('button'));
    }


    public function update(Request $request, Button $button)
    {
        $button->update ($request->all ());
		$data['status'] = 0;
		$button->update($data);
        return redirect()->route ('wechat.button.index')->with ('success','菜单更新成功');
    }

    public function destroy(Button $button)
    {
        $button->delete ();
        return redirect ()->route ('wechat.button.index')->with ('success','删除成功');
    }
    public function push(Button $button,WechatService $wechatService){
		//将原来数据库 json 格式数据转为数组
		$menu = json_decode($button['data'],true);
		//wechat 类要求传递惨淡数据需要时数组
		$res = WeChat::instance('button')->create($menu);
		//dd($res);
		if($res['errcode'] == 0){
			//将当前菜单数据表 status 修改1,其余的改为0
			$button->update(['status'=>1]);
			Button::where('id','!=',$button->id)->update(['status'=>0]);
			return back()->with('success','菜单推送成功');
		}else{
			return back()->with('danger',$res['errmsg']);
		}

	}

}
