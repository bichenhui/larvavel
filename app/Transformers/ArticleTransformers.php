<?php
namespace App\Transformers;
use App\Http\Controllers\Api\CategoryTransformers;

use App\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformers extends TransformerAbstract{

    # 定义可以include可使⽤用的字段
    protected $availableIncludes = ['category','user'];

    public function transform(Article $article){
        return [
            'id' => $article['id'],
            'title' => $article['title'],
            'content'=>$article['content'],
//            'created_at' => $article->created_at->toDateTimeString()
            'created_at' => $article->created_at->format('Y-m-d')
        ];
    }
    public function includeCategory(Article $article){
        return $this->item($article->category,new CategoryTransformers());
    }
    public function includeUser(Article $article)
    {
        return $this->item($article->user, new UserTransformers());
    }
}
