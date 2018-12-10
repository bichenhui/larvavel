<?php
namespace App\Http\Controllers\Api;

use App\Models\Category;
use League\Fractal\TransformerAbstract;


class CategoryTransformers extends TransformerAbstract {
    public function transform(Category $category)
    {
        return [
            'id' => $category['id'],
            'title' => $category['title'],
        ];
    }

}
