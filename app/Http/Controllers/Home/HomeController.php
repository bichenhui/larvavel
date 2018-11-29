<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
	//首页动态
    public function index(){
//    	dd (1);
//		Activity::all();
		$actives=Activity::latest()->paginate(4);;
//		dd ($actives);
    	return view ('home.index',compact ('actives'));
	}
	//搜索框
	public function search(Request $request){
//		dd ($request);
		//搜索关键词
		$wd=$request->query('wd');
//		dd ($wd);
		$articles=Article::search($wd)->paginate(4);
//		dd ($articles);
    	return view ('home.search',compact ('articles'));
	}
}
