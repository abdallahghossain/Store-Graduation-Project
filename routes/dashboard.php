<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\Auth\AuthController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\RoleController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\BlogController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\CouponController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\PermissionController;
use App\Http\Controllers\dashboard\SliderController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [

        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::group(
            [
                'middleware' => 'guest:admin',
                'as' => 'auth.',
                'prefix' => 'dashboard',

            ],
            function () {
                Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
                Route::post('/login', [AuthController::class, 'login']);
            }
        );

        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::group([
            'prefix' => 'dashboard',
            'middleware' => 'auth:admin'
        ], function () {
            // Route::view('/', 'dashboard.index')->name('dashboard.index');
            Route::get('/', [DashboardController::class, 'index']);
            Route::resources([
                // 'products'=>ProductController::class,
                'admins' => AdminController::class,
                'users' => UserController::class,
                'roles' => RoleController::class,
            ]);
            Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
            Route::get('roles/{role}/permissions', [RoleController::class, 'editRolePermissions'])->name('role.edit-permissions');
            Route::put('roles/{role}/permissions', [RoleController::class, 'updateRolePermissions']);

            /////////////////////////////////** Categories Mangemnet*//////////////////////////

            Route::get('categories/trash', [CategoryController::class, 'trash'])
                ->name('categories.trash');
            Route::put('/categories/{id}/restore', [CategoryController::class, 'restore'])
                ->name('categories.restore');
            Route::delete('/categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])
                ->name('categories.force-delete');
            Route::resource('/categories', CategoryController::class);

            /////////////////////////////////** products Mangemnet*//////////////////////////
            Route::get('products/trash', [ProductController::class, 'trash'])
                ->name('products.trash');
            Route::put('/products/{id}/restore', [ProductController::class, 'restore'])
                ->name('products.restore');
            Route::delete('/products/{id?}/force-delete', [ProductController::class, 'forceDelete'])
                ->name('products.force-delete');
            Route::resource('/products', ProductController::class);

            /////////////////////////////////** Front Mangemnet *//////////////////////////

            /////////////////////////////////**Slider*//////////////////////////
            Route::get('/slider/create', [SliderController::class, "create"])->name('slider.create');
            Route::post('/slider', [SliderController::class, "store"])->name('slider.store');
            Route::get('/slider/list', [SliderController::class, "index"])->name('slider.index');
            Route::get('/slider/edit/{id?}', [SliderController::class, "edit"])->name('slider.edit');
            Route::put('/slider/update/{id?}', [SliderController::class, "update"])->name('slider.update');
            Route::delete('/slider/delete/{id?}', [SliderController::class, "destroy"])->name('slider.delete');
            /////////////////////////////////**Coupon*//////////////////////////

            Route::get('/coupon/list', [CouponController::class, "index"])->name('coupon.index');
            Route::get('/coupon/create', [CouponController::class, "create"])->name('coupon.create');
            Route::post('/coupon', [CouponController::class, "store"])->name('coupon.store');
            Route::get('/coupon/edit/{id?}', [CouponController::class, "edit"])->name('coupon.edit');
            Route::put('/coupon/update/{id?}', [CouponController::class, "update"])->name('coupon.update');
            Route::delete('/coupon/delete/{id?}', [CouponController::class, "destroy"])->name('coupon.delete');


            /////////////////////////////////**Blog*//////////////////////////

            Route::get('/blog/list', [BlogController::class, "index"])->name('blog.index');
            Route::get('/blog/create', [BlogController::class, "create"])->name('blog.create');
            Route::post('/blog', [BlogController::class, "store"])->name('blog.store');
            Route::get('/blog/edit/{id?}', [BlogController::class, "edit"])->name('blog.edit');
            Route::put('/blog/update/{id?}', [BlogController::class, "update"])->name('blog.update');
            Route::delete('/blog/delete/{id?}', [BlogController::class, "destroy"])->name('blog.delete');
            Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
        });
    }
);
Route::get('/export-excel', [ProductController::class, 'export'])->name('products.export');
Route::post('/import-excel', [ProductController::class, 'import'])->name('products.import');
Route::get('/user-export', [UserController::class, 'export'])->name('users.export');
Route::get('/export-empty-excel', [UserController::class, 'exportEmptyExcel'])->name('users.empty-excel');
Route::post('/user-import', [UserController::class, 'import'])->name('users.import');
