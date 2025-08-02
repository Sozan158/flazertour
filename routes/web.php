<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\AboutController;
use App\Http\Controllers\clients\ServicesController;
use App\Http\Controllers\clients\PackagesController;
use App\Http\Controllers\clients\DestinationController;
use App\Http\Controllers\clients\ContactController;
use App\Http\Controllers\clients\BlogController;
use App\Http\Controllers\clients\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\clients\RegisterController;
use App\Http\Controllers\clients\SearchController;
use App\Http\Controllers\clients\TourDetailController;
use App\Http\Controllers\clients\TourController;
use App\Http\Controllers\Auth\FacebookController;


Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name("home");

    Route::get('/about',  [AboutController::class, 'index'])->name("about");

    Route::get('/services',  [ServicesController::class, 'index'])->name("services");

    Route::get('/packages', [PackagesController::class, 'index'])->name("packages");

    Route::get('/destination', [DestinationController::class, 'index'])->name("destination");

    Route::get('/contact', [ContactController::class, 'index'])->name("contact");

    Route::get('/blog',  [BlogController::class, 'index'])->name("blog");

    Route::get('/tour-detail/{id}',  [TourDetailController::class, 'index'])->name("tour-detail");

    Route::get('/search',  [SearchController::class, 'search'])->name("search");
});

//Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name("login");
Route::post('/login', [LoginController::class, 'login']);


Route::middleware('web')->group(function () {
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login-google');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});




Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);



Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name("register");
Route::post('/register', [RegisterController::class, 'register']);


Route::post('/check-username', [RegisterController::class, 'checkUsername'])->name('check.username');
Route::post('/check-email', [RegisterController::class, 'checkEmail'])->name('check.email');
Route::post('/check-phone', [RegisterController::class, 'checkPhone'])->name('check.phone');


Route::post('/logout', [RegisterController::class, 'logout'])->name("logout");

Route::get('/session-test', function () {
    session(['key' => 'value']);
    return session('key'); // Nếu hoạt động, sẽ trả về "value"
});

Route::get('/delete-data', function () {
    return view('delete_data');
});

Route::get('/test-connection', function () {
    try {
        DB::connection()->getPdo();
        return "<h2 style='color:green;'>✅ Kết nối MySQL thành công!</h2>";
    } catch (MyCustomException $e) {
        return "<h2 style='color:red;'>❌ Lỗi kết nối: " . $e->getMessage() . "</h2>";
    }
});




Route::get('/tours', action: [TourController::class, 'index'])->name("tours");

//Backend

require __DIR__ . '/admin.php';
