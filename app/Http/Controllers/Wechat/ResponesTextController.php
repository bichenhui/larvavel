<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponesText;
use App\Servies\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ResponesTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//读取所有回复
    	$field=ResponesText::all ();
		return view ('wechat.response_text.index',compact ('field'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WechatService $wechatService)
    {
    	$ruleView=$wechatService->ruleView ();
		return view ('wechat.response_text.create',compact ('ruleView'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,WechatService $wechatService)
    {
//    	dd ($request->all ());
		//开启事务
		DB::beginTransaction();
		$rule=$wechatService->ruleStore () ;
		//添加回复内容
		ResponesText::create ([
			'content'=>$request['data'],
			'rule_id'=>$rule['id']
							  ]);
		//事务提交
		DB::commit();
		return redirect ()->route ('wechat.respones_text.index')->with ('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponesText  $responesText
     * @return \Illuminate\Http\Response
     */
    public function show(ResponesText $responesText)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponesText  $responesText
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponesText $responesText,WechatService $wechatService)
    {
//    		dd ($responseText);
		$ruleView=$wechatService->ruleView ($responesText['rule_id']);
		//获取回复内容的旧数据
//        dd($responseText);
		return view ('wechat.response_text.edit',compact ('ruleView','responesText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponesText  $responesText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponesText $responesText,WechatService $wechatService)
    {
		//开启事务
		DB::beginTransaction();
//        dd($responesText);
		//更新规则表和关键词表
		$wechatService->ruleUpdate($responesText['rule_id']);
		//更新回复表
		$responesText->update([
								  'content'=>$request['data'],
								  'rule_id'=>$responesText['rule_id'],
							  ]);
		//事务提交
		DB::commit();
		return redirect()->route('wechat.respones_text.index')->with('success','操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponesText  $responesText
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponesText $responesText)

    {
//        dd ($responesText);
		$responesText->rule ()->delete ();
		return redirect()->route('wechat.respones_text.index')->with('success','操作成功');
    }
}
