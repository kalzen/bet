<?php

use App\Http\Controllers\Admin\AssignedContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BookerCategoryController;
use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\BookerController;
use App\Http\Controllers\Admin\CodeController;
use App\Http\Controllers\Admin\LangController as AdminLangController;
use App\Http\Controllers\Admin\TipController;
use App\Http\Controllers\BookerController as ClientBookerController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\TipController as ClientTipController;
use App\Http\Controllers\UserController as ClientUserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/lang/{locale}', [LocaleController::class, 'setLocale'])->name('change-language');

Route::middleware(['localization'])->group(function () {
    $locale = App::getLocale()??'en';
    Route::get('/', function () use ($locale) {
        return redirect("/$locale");
    });
    Route::get('/tip', function () use ($locale) {
        return redirect("/$locale/tip");
    })->name('tip.list.no-lang');
    Route::any('/booker', function () use ($locale) {
        return redirect("/$locale/booker");
    })->name('booker.list.no-lang');
    Route::any('/user/{id}', function ($id) use ($locale) {
        return redirect("/$locale/user/$id");
    })->name('user.detail.no-lang');
    Route::any('/booker/{alias}', function ($alias) use ($locale) {
        return redirect("/$locale/booker/$alias");
    })->name('booker.detail.no-lang');
    Route::get('/bookers/{slug}', function ($slug) use ($locale) {
        return redirect("/$locale/bookers/$slug");
    })->name('booker.filter.no-lang');
    Route::get('/home', function () use ($locale) {
        return redirect("/$locale/home");
    })->name('home.no-lang');
    Route::get('/news/', function () use ($locale) {
        return redirect("/$locale/news");
    })->name('post.list.no-lang');
    Route::get('/news-category/{alias}', function ($alias) use ($locale) {
        return redirect("/$locale/news-category/$alias");
    })->name('post.category.no-lang');
    Route::get('/news/search', function () use ($locale) {
        return redirect("/$locale/news/search");
    })->name('post.search.no-lang');
    Route::get('/news/{alias}', function ($alias) use ($locale) {
        return redirect("/$locale/news/$alias");
    })->name('post.detail.no-lang');
    Route::any('/livescore', function () use ($locale) {
        return redirect("/$locale/livescore");
    })->name('livescore.index.no-lang');
    Route::any('/leaderboard', function () use ($locale) {
        return redirect("/$locale/leaderboard");
    })->name('bxh.index.no-lang');
});

Route::group(['prefix' => '{locale_code}', 'middleware' => 'localization'], function () {
// Route::middleware(['localization'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    // Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    // Route::get('/tu-van', [HomeController::class, 'advise'])->name('advise');
    Route::get('/tip', [ClientTipController::class, 'index'])->name('tip.list');
    Route::any('/booker', [ClientBookerController::class, 'index'])->name('booker.list');
    Route::any('/user/{id}', [ClientUserController::class, 'detail'])->name('user.detail');
    Route::any('/booker/{alias}', [ClientBookerController::class, 'detail'])->name('booker.detail');
    Route::get('/bookers/{slug}', [ClientBookerController::class, 'filter'])->name('booker.filter');
    // Route::any('/gioi-thieu', [HomeController::class, 'about'])->name('about');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::any('/lien-he', [HomeController::class, 'contact'])->name('contact');
    // Route::get('/san-pham/{alias}', [App\Http\Controllers\ProductController::class, 'detail'])->name('product.detail');
    // Route::get('/search', [App\Http\Controllers\ProductController::class, 'searchByKeyword'])->name('product.search');
    // Route::get('/danh-muc/{alias}', [App\Http\Controllers\ProductController::class, 'catalogue'])->name('product.catalogue');
    Route::get('/news/', [App\Http\Controllers\PostController::class, 'index'])->name('post.list');
    Route::get('/news-category/{alias}', [App\Http\Controllers\PostController::class, 'category'])->name('post.category');
    Route::get('/news/search', [App\Http\Controllers\PostController::class, 'search'])->name('post.search');
    Route::get('/news/{alias}', [App\Http\Controllers\PostController::class, 'detail'])->name('post.detail');
    Route::any('/livescore', [App\Http\Controllers\LiveScoreController::class, 'index'])->name('livescore.index');
    Route::any('/leaderboard', [App\Http\Controllers\BXHController::class, 'index'])->name('bxh.index');
    // Route::get('/crawl', [App\Http\Controllers\ProductController::class, 'crawl'])->name('product.crawl');
    // Route::get('/getPrice', [App\Http\Controllers\ProductController::class, 'getPrice'])->name('getPrice');
    // Route::get('/getThumb', [App\Http\Controllers\ProductController::class, 'getThumb'])->name('getThumb');
    // Route::get('/addtocart', [App\Http\Controllers\ProductController::class, 'addtocart'])->name('addtocart');
    // Route::get('/cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
    // Route::get('/gio-hang', [App\Http\Controllers\ProductController::class, 'cartIndex'])->name('cart.index');
    // Route::get('/thanh-toan', [App\Http\Controllers\ProductController::class, 'checkout'])->name('checkout');
    // Route::get('/remove-cart', [App\Http\Controllers\ProductController::class, 'removeFromCart'])->name('removeFromCart');
    // Route::get('/clearcookies', [App\Http\Controllers\ProductController::class, 'clearCookie'])->name('clearcookie');
    // Route::get('product/update-cart-item', [App\Http\Controllers\ProductController::class, 'updateCartItem'])->name('product.update-cart-item');
});

Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
    Route::any('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //User
    Route::resource('user', UserController::class);
    //Slide
    Route::resource('slide', SlideController::class);
    Route::post('slide/lang', [SlideController::class, 'lang'])->name('slide.lang');
    //Menu
    Route::resource('menu', MenuController::class);
    Route::post('menu/lang', [MenuController::class, 'lang'])->name('menu.lang');
    //Order
    Route::resource('order', OrderController::class);
    //Category
    Route::resource('category', CategoryController::class);
    Route::post('category/lang', [CategoryController::class, 'lang'])->name('category.lang');
    //Booker Category
    Route::resource('booker_category', BookerCategoryController::class);
    Route::post('booker_category/lang', [BookerCategoryController::class, 'lang'])->name('booker_category.lang');
    //Catalogue
    Route::resource('catalogue', CatalogueController::class);
    //Attribute
    Route::resource('attribute', AttributeController::class);
    //Post
    Route::resource('post', PostController::class);
    //Assigned Content
    Route::resource('assigned-content', AssignedContentController::class);
    //Message
    Route::resource('message', MessageController::class);
    //Testimonial
    Route::resource('testimonial', TestimonialController::class);
    //Team 
    Route::resource('team', TeamController::class);
    //Booker 
    Route::resource('booker', BookerController::class);
    //Code 
    Route::resource('code', CodeController::class);
    //Tip 
    Route::resource('tip', TipController::class);
    //Lang
    Route::resource('lang', AdminLangController::class);
    Route::post('lang/restore', [AdminLangController::class, 'restore'])->name('lang.restore');
    Route::post('lang/forceDelete', [AdminLangController::class, 'forceDestroy'])->name('lang.forceDelete');
    //Attribute
    Route::resource('attribute', AttributeController::class);
    Route::prefix('post')->name('post.')->group(function () {
        Route::post('category', [PostController::class, 'category'])->name('category');
        Route::post('lang', [PostController::class, 'lang'])->name('lang');
        Route::post('remove-bind', [PostController::class, 'removeBind'])->name('removeBind');
    });
    Route::prefix('assigned-content')->name('assigned-content.')->group(function () {
        Route::post('lang', [AssignedContentController::class, 'lang'])->name('lang');
        Route::post('remove-bind', [AssignedContentController::class, 'removeBind'])->name('removeBind');
    });
    Route::prefix('booker')->name('booker.')->group(function () {
        Route::post('category', [BookerController::class, 'category'])->name('category');
        Route::post('lang', [BookerController::class, 'lang'])->name('lang');
        Route::post('remove-bind', [BookerController::class, 'removeBind'])->name('removeBind');
    });
    //Product
    Route::post('update_formula', [ProductController::class, 'updateFormula'])->name('product.updateFormula');
    Route::resource('product', ProductController::class);
    Route::prefix('product')->name('product.')->group(function () {
        Route::post('category', [ProductController::class, 'category'])->name('category');
    });
    //Setting
    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('', [SettingController::class, 'index'])->name('index');
        Route::post('', [SettingController::class, 'update'])->name('update');
    });
});
