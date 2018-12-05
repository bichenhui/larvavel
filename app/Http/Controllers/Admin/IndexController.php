<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
    	return view ('admin.index.index');
	}
}
//创建字段   laravel-china 数据库迁移中
//php artisan make:migration add_votes_to_users_table --table=users

