<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*', function($view) {

            $global_setting = DB::table('global_setting')->where('id', 1)->first();

            $settings = DB::table('settings')->get();

            $view->with(['global_setting'=> $global_setting,'settings'=>$settings]);
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
