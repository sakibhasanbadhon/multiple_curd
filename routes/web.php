<?php



use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueueController;
use App\Mail\WelcomeMail;
use GuzzleHttp\Middleware;

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



// Route::get('/{locale}', function($locale) {

//     App::setLocale($locale);

//     return view('welcome');

// });


Route::get('/', function() {
    return view ('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('index');


// ................. Category ...............

    Route::group(['prefix'=>'category','as'=>'category.'], function(){
        Route::get('/',[CategoryController::class, 'index'])->name('index');
        Route::get('create',[CategoryController::class, 'create'])->name('create');
        Route::post('store',[CategoryController::class, 'store'])->name('store');
        Route::get('{id}/edit',[CategoryController::class, 'edit'])->name('edit');
        Route::put('{id}/update',[CategoryController::class, 'update'])->name('update');
        Route::delete('{id}/delete',[CategoryController::class, 'delete'])->name('delete');

    });



// ................. Brand ...............



Route::group(['prefix'=>'brand','as'=>'brand.'], function(){

    Route::get('/',[BrandController::class, 'index'])->name('index');
    Route::get('create',[BrandController::class, 'create'])->name('create');
    Route::post('store',[BrandController::class, 'store'])->name('store');
    Route::get('{brand}/edit',[BrandController::class, 'edit'])->name('edit');
    Route::put('{brand}/update',[BrandController::class, 'update'])->name('update');
    Route::delete('{brand}/delete',[BrandController::class, 'delete'])->name('delete');

});

// ................. product ...............


Route::resource('products',ProductController::class)->middleware('auth');


// Route::get('products',[ProductController::class, 'index'])->name('products.index');
// Route::get('products/create',[ProductController::class, 'create'])->name('products.create');
// Route::post('products/store',[ProductController::class, 'store'])->name('products.store');
// Route::delete('products/destroy/{product_id}',[ProductController::class, 'destroy'])->name('products.destroy');
// Route::get('products/{product_id}/edit',[ProductController::class, 'edit'])->name('products.edit');
// Route::put('products/{product_id}/update',[ProductController::class, 'update'])->name('products.update');

// Route::get('products/{product_id}/show',[ProductController::class, 'show'])->name('products.show');

