<?php
use App\Http\Controllers\adminController;
use App\Models\order;
use App\Models\product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\userController;

route::group(
    [
        'middleware' => ['auth:admin'],
        'prefix' => 'admin',
    ],
    function () {
        Route::get('/dashboard', function () {
            $order = count(order::all());
            $product = count(product::all());

            return view('dashboard.main', ['order' => $order, 'product' => $product]);
        })->name('dashboard');

        Route::get('/users', [userController::class, 'index'])->name('user.index');
        Route::get('/users/{user}', [userController::class, 'show'])->name('user.show');

        Route::get('/admins', [adminController::class, 'index'])->name('admin.index');
        Route::get('/register', [adminController::class, 'create'])->name('admin.create');
        Route::post('/register', [adminController::class, 'store'])->name('admin.store');
        Route::get('/admins/{user}', [adminController::class, 'show'])->name('admin.show');
        Route::get('/profile', [adminController::class, 'edit'])->name('admin.profile.edit');
        Route::put('/profile', [adminController::class, 'update'])->name('admin.profile.update');
        Route::delete('/admins/{user}', [adminController::class, 'destroy'])->name('admin.destroy');

        Route::get('/indexproduct', [productController::class, 'index'])->name('product.index');
        Route::get('/product/{product}', [productController::class, 'showForAdmin'])->name('product.A_show');
        Route::get('/createproduct', [productController::class, 'create'])->name('product.create');
        Route::post('/storeproduct', [productController::class, 'store'])->name('product.store');

        Route::get('/product/{product}/edit', [productController::class, 'edit'])->name('product.edit');
        Route::put('/product/{product}', [productController::class, 'update'])->name('product.update');
        Route::delete('/product/{product}', [productController::class, 'destroy'])->name('product.destroy');

        Route::post('/updateQuantity', [productController::class, 'updateQuantity'])->name('product.updateQuantity');

        Route::get('/indexcategory', [categoryController::class, 'index'])->name('category.index');
        Route::get('/createcategory', [categoryController::class, 'create'])->name('category.create');
        Route::post('/storecategory', [categoryController::class, 'store'])->name('category.store');
        Route::get('/category/{category}', [categoryController::class, 'showforAdmin'])->name('category.A_show');
        Route::get('/category/{category}/edit', [categoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/{category}/update', [categoryController::class, 'update'])->name('category.update');
        Route::delete('/categorydestroy/{category}', [categoryController::class, 'destroy'])->name('category.destroy');

        Route::get('/indexorder', [orderController::class, 'index'])->name('order.index');
        
        Route::get('/order/{order}', [orderController::class, 'show'])->name('order.show');
        Route::delete('/order/{order}', [orderController::class, 'destroy'])->name('order.destroy');
    },
);
