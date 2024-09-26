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
use App\Models\Menu;
use App\Models\Order;
use App\Models\Slide;

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
            
        });
        View::composer(['contact.index','partials.*', 'layouts.*', 'home.*', 'contact.advise'], function ($view) {
            View::share('shared_config', Config::all()->keyBy('name'));
            
        });
        View::composer(['home.*','partials.header', 'product.index', 'layouts.*'], function ($view) {
            View::share('shared_categories', Catalogue::all());
            
        });
        View::composer(['home.*', 'layouts.*'], function ($view) {
            View::share('shared_nav_links', Menu::all());
            View::share('slides', Slide::orderBy('ordering','asc')->get());
            View::share('shared_bookers', Booker::take(5)->get());
        });

    }
}
