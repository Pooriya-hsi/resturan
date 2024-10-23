<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::get('/about-us', function () {
    return view('about_us');
})->name('about.index');

Route::group(['prefix' => 'contact-us'], function () {
    Route::get('/', [ContactUsController::class, 'index'])->name('contact.index');
    Route::post('/', [ContactUsController::class, 'store'])->name('contact.store');
});

Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/menu', [ProductController::class, 'menu'])->name('product.menu');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/check-otp', [AuthController::class, 'checkOtp'])->name('auth.checkOtp');
    Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('auth.resendOtp');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/{user}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/addresses', [ProfileController::class, 'addresses'])->name('profile.address');
    Route::get('/addresses/create', [ProfileController::class, 'addressCreate'])->name('profile.address.create');
    Route::post('/addresses', [ProfileController::class, 'addressStore'])->name('profile.address.store');
    Route::get('/addresses/{address}/edit', [ProfileController::class, 'addressEdit'])->name('profile.address.edit');
    Route::put('/addresses/{address}', [ProfileController::class, 'addressUpdate'])->name('profile.address.update');

    Route::get('/wishlist', [ProfileController::class, 'wishlist'])->name('profile.wishlist');
    Route::get('/remove-from-wishlist', [ProfileController::class, 'removeFromWishlist'])->name('profile.wishlist.remove');

    Route::get('/orders', [ProfileController::class, 'orders'])->name('profile.order');
});
Route::get('profile/add-to-wishlist', [ProfileController::class, 'addToWishlist'])->name('profile.wishlist.add');


Route::prefix('cart')->middleware('auth')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/increment', [CartController::class, 'increment'])->name('cart.increment');
    Route::get('/decrement', [CartController::class, 'decrement'])->name('cart.decrement');
    Route::get('/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/check-coupon', [CartController::class, 'checkCoupon'])->name('cart.checkCoupon');
});

Route::prefix('payment')->middleware('auth')->group(function () {
    Route::post('/send', [PaymentController::class, 'send'])->name('payment.send');
    Route::get('/verify', [PaymentController::class, 'verify'])->name('payment.verify');
    Route::get('/status', [PaymentController::class, 'status'])->name('payment.status');
});