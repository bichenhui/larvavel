<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseNews;
use App\Servies\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ResponseNewsController extends Controller
{
	public function __construct ()
	{
		$this->middleware('admin.auth',[
			'except'=>[],
		]);
	}

	public function index()
    {
		//读取所有回复
		$field=ResponseNews::all ();
       return view ('wechat.response_news.index',compact ('field'));
    }


    public function create(WechatService $wechatService)
    {
		$ruleView=$wechatService->ruleView ();
		return view ('wechat.response_news.create',compact ('ruleView'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,WechatService $wechatService)
    {
//		dd ($request->all ());
		//开启事务
		DB::beginTransaction();
//		dd($request->data);
		$rule=$wechatService->ruleStore ('news');
//		dd ($rule);
		//添加回复内容
		ResponseNews::create([
			'data'=>$request['data'],
			'rule_id'=>$rule['id']
							  ]);
		//事务提交
		DB::commit();
		return redirect ()->route ('wechat.response_news.index')->with('success','添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function show(ResponseNews $responseNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseNews $responseNews,WechatService $wechatService)
    {
//        dd (32);
//		dd ($responseNews);
		$ruleView=$wechatService->ruleView ($responseNews['data']);
//		dd ($responseNews['data']);
//		dd ($ruleView);
		return view ('wechat.response_news.edit',compact ('ruleView','responseNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseNews $responseNews,WechatService $wechatService)
    {
		//开启事务
		DB::beginTransaction();
//        dd($responseText);
		//更新规则表和关键词表
		$wechatService->ruleUpdate($responseNews['rule_id']);
		//更新回复表
		$responseNews->update([
								  'data'=>$request['data'],
								  'rule_id'=>$responseNews['rule_id'],
							  ]);
		//事务提交
		DB::commit();
		return redirect()->route('wechat.response_news.index')->with('success','操作成功');

	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseNews $responseNews)
    {
        $responseNews->rule ()->delete ();
		return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }
}
