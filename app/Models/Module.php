<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	//除了【】都可以填充
    protected $guarded=[];
    protected $casts=[
        'permissions'=>'array'
	];
}
