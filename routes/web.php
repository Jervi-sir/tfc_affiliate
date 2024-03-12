<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClickController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\AffiliateLinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () { return view('admin.dashboard.statistics'); })->name('admin.dashboard');
    Route::get('/product/add', [ProductController::class, 'addProductPage'])->name('admin.product.add');        //[done]
    Route::post('/product/store', [ProductController::class, 'addNewProduct'])->name('admin.product.store');    //[done]

    Route::get('/product/list', [ProductController::class, 'listProducts'])->name('admin.product.list');   //[done]
    Route::get('/product/edit/{id}', [ProductController::class, 'editProduct'])->name('admin.product.edit'); //[done]
    Route::post('/product/edit/{id}', [ProductController::class, 'updateProduct'])->name('admin.product.update'); //[done]

    Route::get('/list-orders', function () { return view('admin.products.edit'); })->name('admin.order.list');

    // Affiliate Links
    Route::post('/generate-affiliate-link', [AffiliateLinkController::class, 'generate'])->name('affiliate-links.generate');
    Route::get('/affiliated-products', [AffiliateLinkController::class, 'listAffiliatedProducts'])->name('admin.affiliated.list');
});

Route::prefix('client')->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home.home');
    Route::get('/search', [HomeController::class, 'search'] )->name('search.results');

    Route::middleware('auth')->group(function () {
        Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
        Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
        Route::delete('/cart/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout.show');
        Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');
    });
});

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [HomeController::class, 'show'])->name('products.show');

//Route::get('/list-users', [AffiliateLinkController::class, 'listAffiliatedUsers'])->name('admin.affiliated.users');

// Click Tracking
Route::get('/affiliate/{affiliateLink}', [ClickController::class, 'trackClick'])->name('clicks.store');

// Commissions
Route::get('/commissions', [CommissionController::class, 'index'])->name('commissions.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
