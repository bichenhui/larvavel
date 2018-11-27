<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $casts = [
		'created_at' => 'datetime:Y-m-d',
	];
    public function user(){
    	return $this->belongsTo (User::class);
	}
	//定义 多态关联
	public function zan(){
//		//第一个参数关联模型,第二个参数跟数据迁移  zan_id  zan_type
    	return $this->morphMany (Zan::class,'zan');
	}
	//评论关联通知
	public function article(){
    	return $this->belongsTo (Article::class);
	}
}
