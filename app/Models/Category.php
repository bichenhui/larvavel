<?php

namespace App\Models;

use App\User\Article;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable=[
		 'title','icon'
		];
	public function article(){
		return $this->hasmany(Article::class);
	}
}
