<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//			dd (2);  只要出发后台管理就会直接出发中间件admin
    	//artisan make:middleware+类名  这是中间件的快捷方式
    	//检测用户是否登录
//		if (!auth ()->check ()||auth ()->user ()->is_admin !=1){
//			return redirect ()->route ('home');
//		}
		if(!auth()->check() || !auth()->user()->can('Admin-admin-index')){
			return redirect()->route('home');
		}
        return $next($request);
    }
}
