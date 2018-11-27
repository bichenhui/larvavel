<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZanColltroller extends Controller
{
	public function __construct ()
	{
		//auth中间件对应的中间件在哪里,需要看注册中间件(app/Http/Kernal.php中$routeMiddleware)
		//article/show.blade.php模板中点赞增加 auth 判断用户是否登录
		$this->middleware('auth',[
			'only'=>['make']
		]);
	}

	//点赞  取消点赞
	public function make(Request $request){
//		dd (1);
		$type=$request->query('type');
		$id=$request->query('id');
//		dd ($id); article   id = 69
//		dd ($request->all ());
//		array:2 [▼
//  	"type" => "article"
//  	"id" => "69"]
		//根据 get 参数 type 组合模型类 class 名
		$class='App\Models\\'.ucfirst ($type);
//		dd ($class);//"App\Models\Article"
		//文章 评论
		$model=$class::find($id);
//		dd ($model);
		//获取当前文章Article/评论 的所有点赞模型数据
//		dd ($model->zan->all());
		//获取点赞数据
//		$zan=$model->zan()->create(['user_id'=>auth()->id()]);
//		dd ($zan);
		if ($zan=$model->zan->where('user_id',auth ()->id ())->first()){
			//执行删除
			$zan->delete();
		}else{
			//执行添加   获取点赞数据
			$model->zan()->create(['user_id'=>auth()->id()]);
		}
		//		判断是不是异步
		if ($request->ajax ()){
			//这个需要重新获取对应模型,这句话结合异步请求
			$newModel=$model::find($id);
//			dd ($newModel);
			return ['code'=>1,'message'=>'','num'=>$newModel->zan->count()];
		}

		return back();
	}
}
