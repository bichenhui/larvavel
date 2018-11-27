<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	//定义文章与用户的关联
	public function user(){
		return $this->belongsTo (User::class);
	}
	public function category(){
		//定义栏目关联
		return $this->belongsTo (Category::class);
	}
	//定义  多态关联
	public function zan(){
		return $this->morphMany (Zan::class,'zan');
	}
//	//定义 多态关联
	public function collect(){
		//第一个参数关联模型,第二个参数跟数据迁移  zan_id  zan_type
		return $this->morphMany (Collect::class,'collect');
	}
}
