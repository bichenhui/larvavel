<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable=['name','type'];

	//关联关键词
    public function keyword(){
    	return $this->hasMany (Keyword::class);
	}
	//图文关联
	public function responseNews(){
    	return $this->hasMany (ResponseNews::class);
	}
	//文本回复
	public function responesText(){
    	return $this->hasMany (ResponesText::class);
	}
}

