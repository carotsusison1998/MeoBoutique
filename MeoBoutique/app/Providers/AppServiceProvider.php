<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('headertop', function($view){
            if (Auth::check()) {
                $user = Auth::check();
                $id = Auth::user()['id'];
                $admin = User::find($id);
                $view->with(['admin' => $admin]);
            }
        });
        view()->composer('headerleft', function($view){
            if (Auth::check()) {
                $user = Auth::check();
                $id = Auth::user()['id'];
                $admin = User::find($id);
                $view->with(['admin' => $admin]);
            }
        });
    }
}
