<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Product_FontendController;
use Illuminate\Support\Facades\Auth;


// Fontend product functions

    // Hiển thị view
    Route::get('/', [Product_FontendController::class, 'index']);

    // Product routes
    Route::get('/products', [ProductController::class, 'products'])->name('products');
    Route::get('/products_categories/{category}', [ProductController::class, 'showByCategory'])->name('products.category');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::post('/products/{product}/comment', [ProductController::class, 'postComment'])->name('product.comment');
    Route::get('/products/{product}/comment', [ProductController::class, 'showComment'])->name('product.showcomment');

    // Hiển thị contact
    Route::get('/contact', function () {
        return view('fontend.contact');
    }); 

    // Auth routes
    Route::middleware('auth')->group(function () {
        
    // Chỉnh sửa thông tin người dùng
    //câp nhật user fontend
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');

    // Cart routes
    // Route để hiển thị giỏ hàng
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Route để thêm sản phẩm vào giỏ hàng
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');

    // Route để cập nhật mục trong giỏ hàng
    Route::post('/cart/update', [CartController::class, 'updateCartItem'])->name('cart.update');

    // Route để xóa mục khỏi giỏ hàng
    Route::post('/cart/remove', [CartController::class, 'removeCartItem'])->name('cart.remove');

    // Các route yêu cầu vai trò admin
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Product routes
    Route::get('/admin_products', [AdminController::class, 'Admin_Products']);
    Route::post('/admin_products', [AdminController::class, 'storeproducts']);
    Route::put('/admin_products/{product}', [AdminController::class, 'updateproducts'])->name('admin.products.update');
    Route::delete('/admin_products/{id}', [AdminController::class, 'destroyproduct']);

    // User routes
    Route::get('/admin_users', [AdminController::class, 'Admin_Users']);
    Route::post('/admin_users', [AdminController::class, 'storeusers']);
    Route::get('/admin_users/{id}', [AdminController::class, 'editusers']);
    Route::put('/admin_users/{id}', [AdminController::class, 'updateusers']);
    Route::delete('/admin_users/{id}', [AdminController::class, 'destroyusers']);

    //orders routes
    Route::get('/admin_orders', [AdminController::class, 'Admin_Orders']);
    // Route để hiển thị form chỉnh sửa trạng thái đơn hàng
    Route::get('/admin/orders/{id}', [AdminController::class, 'deleteOrder']);
    Route::get('/admin_orders/order-detail/{id}', [AdminController::class, 'orderDetail']);

});

    





