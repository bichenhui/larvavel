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
}
