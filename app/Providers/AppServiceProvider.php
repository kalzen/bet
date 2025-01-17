<?php

namespace App\Providers;

use App\Models\Booker;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Config;
use App\Models\Lang;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Slide;
use Illuminate\Support\Facades\App;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        View::composer('admin.partials.sidebar', function ($view) {
            View::share('shared_orders_count', Order::count());
            
        });
        View::composer('partials.header', function ($view) {
            View::share('shared_catalogues', Catalogue::orderBy('id','asc')->get());
            View::share('langs', Lang::orderBy('id','asc')->get());
        });
        View::composer(['*'], function ($view) {
            View::share('shared_config', Config::all()->keyBy('name'));
            
        });
        View::composer(['home.*','partials.header', 'product.index', 'layouts.*'], function ($view) {
            View::share('shared_categories', Catalogue::all());
            
        });
        View::composer(['home.*', 'layouts.*'], function ($view) {
            View::share('shared_nav_links', cache()->remember('shared_nav_links', now()->addMinutes(60), function () {
                return Menu::whereNull('parent_id')->whereNull('lang_parent_id')->with('children','langs','langChildren','langChildren.langs','langParent')->get();
            }));

            View::share('slides', cache()->remember('slides', now()->addMinutes(60), function () {
                return Slide::orderBy('ordering','asc')->whereNull('lang_parent_id')->get();
            }));

            View::share('shared_bookers', cache()->remember('shared_bookers', now()->addMinutes(60), function () {
                return Booker::whereNull('lang_parent_id')->with('langs','langChildren','langChildren.langs','langParent')->get();
            }));
        });

    }
}
