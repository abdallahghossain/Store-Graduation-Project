<?php

use App\Http\Controllers\front\Auth\userAuthController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ProductController;
use Illuminate\Support\Facades\Route;

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
Route::group(
    [
        'as' => 'auth.',
        'prefix' => 'front'
    ],
function () {
Route::get('/userRegister' ,[userAuthController::class, 'showRegister'])->name('userRegister');
Route::post('/userRegister' ,[userAuthController::class, 'register']);
Route::get('/userLogin' ,[userAuthController::class, 'showLogin'])->name('userLogin');
Route::post('/userLogin' ,[userAuthController::class, 'login']);
    }
);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [HomeController::class, 'blog'])->name("blog");
Route::get('/products/{product}', [ProductController::class, 'show'])->name('single_product');
Route::get('products/review/{id}', [ProductController::class,'reviewstore'])->name('products.review.store');
Route::post('/products/{product}/rate', [ProductController::class, 'rate'])->name('products.rate');
Route::get('/shop', [HomeController::class, 'ShowAllProducts'])->name('shop.ShowAllProducts');
// Route::resource('/carts', CartController::class);
Route::get('/contact-us',[HomeController::class,'contact'])->name("contact");

Route::view('/checkout', 'front.checkout')->name('checkout');
Route::get('/contact-us',[HomeController::class,'contact'])->name("contact");
Route::view('/about', 'front.about')->name("about");
Route::get('logout', [userAuthController::class, 'logout'])->name('auth.logout');
Route::get('userlogout', [userAuthController::class, 'logout'])->name('auth.userLogout');
Route::get('decrease-cart-item-qty/{id}' , [CartController::class , 'decreaseQty'])->name('decreaseQty');
Route::get('cart', [CartController::class , 'index'])->name('Cart');
Route::delete('/cart/delete/{id}', [CartController::class,'delete'])->name('cart.delete');
Route::get('add-to-cart/{id}' , [CartController::class , 'addToCart'])->name('add-to-cart');
Route::get('/cart' , [CartController::class , 'showCart'])->name('cart');


require __DIR__ . '/dashboard.php';
