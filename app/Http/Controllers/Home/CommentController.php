<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
		//获取指定文章所有评论数据
    public function index(Request $request,Comment $comment){

//		dd ($request->article_id);
//		dd ($comment->get());
//		$comments = $comment->where('article_id',$request->article_id)->get();
		////这样关联,保证 Comment 模型中有关联 user 的方法
		$comments=$comment->with(['user'])->where('article_id',$request->article_id)->get ();
//		dd($comments->toArray());
		foreach ($comments as $comment){
			$comment->zan_num=$comment->zan->count();
		}
		return ['code'=>1,'message'=>'','comments'=>$comments];
    }
	//添加评论
    public function store(Request $request,Comment $comment)
    {
//		dd ($request->toArray ());
		//执行评论表添加
		$comment->user_id = auth()->id();
		$comment->article_id = $request->article_id;
		$comment->content = $request['content'];
		$comment->save();
//		dd($comment);
		//dd($comment->with('user')->get()->toArray());
		//关联 user
		$comment=$comment->with('user')->find($comment->id);
		$comment->zan_num=$comment->zan->count();
//		dd($comment->toArray());
		return ['code'=>1,'message'=>'','comment'=>$comment];
    }

    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }


    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        //
    }
}
