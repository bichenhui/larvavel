<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {//mysql版本低
		Schema::defaultStringLength(191);
		//Carbon 中文时间
		Carbon::setLocale ('zh');
		//注册观察者
		User::observe (UserObserver::class);
	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		if ($this->app->environment() !== 'production') {
			$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
		}
        //
    }
}
