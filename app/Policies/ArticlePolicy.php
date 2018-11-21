<?php

namespace App\Policies;

use App\User;
use App\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }


    public function update(User $user, Article $article)
    {
		//dd($user);//当前登录用户
		//传递进来的模型
//		dd($article);
		return $user->id == $article->user_id || $user->is_admin == 1;
    }


    public function delete(User $user, Article $article)
    {
        return $user->id==$article->user_id || $user->is_admin == 1;
    }

    public function restore(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function forceDelete(User $user, Article $article)
    {
        //
    }
}
