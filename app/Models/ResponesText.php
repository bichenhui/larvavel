<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponesText extends Model
{
    protected $fillable=['content','rule_id'];

	//关联规则
	public function rule(){
		return $this->belongsTo (Rule::class);
	}
}
