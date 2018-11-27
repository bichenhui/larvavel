<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
	public function __construct ()
	{
		$this->middleware('auth' ,[
			'only'=>['make']
		]);
	}

	public function make(Request $request){
//   	dd (1);
	   $type=$request->query('type');
	   $id=$request->query('id');
//	   dd ($id);
		//获取类型
	   $class='App\Models\\'.ucfirst ($type);
//	   dd ($class);//"App\Models\Article"
	   //当前文章 id
	   $model=$class::find($id);
//	   dd ($model);
//	   $collect=$model->collect()->create(['user_id',auth ()->id ()]);
//	   dd ($collect);
	   if($collect=$model->collect->where('user_id',auth ()->id ())->first()){
	   	//执行删除
		   $collect->delete();
	   }else{
	   	//执行添加
	   	$model->collect()->create(['user_id'=>auth ()->id ()]);
	   }
	   return back();
   }
}
