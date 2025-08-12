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
use App\Http\Controllers\clients\FilterController;
use App\Http\Controllers\clients\TourDetailController;
use App\Http\Controllers\clients\TourController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\clients\BookingController;
use App\Http\Controllers\clients\CheckoutController;
use App\Http\Controllers\clients\ProfileController;




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

    Route::get('/filter',  [FilterController::class, 'filter'])->name("filter");
});


//Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name("login");
Route::post('/login', [LoginController::class, 'login']);



Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name("login-google");
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);



Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name("register");
Route::post('/register', [RegisterController::class, 'register']);



Route::post('/check-username', [RegisterController::class, 'checkUsername'])->name('check.username');
Route::post('/check-email', [RegisterController::class, 'checkEmail'])->name('check.email');
Route::post('/check-phone', [RegisterController::class, 'checkPhone'])->name('check.phone');
Route::get('activation-account/{token}', [LoginController::class, 'activateAccount'])->name('activation.account');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile_user', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile_user/update', [ProfileController::class, 'update'])->name('user-profile');
    Route::post('/profile_user/changePassword', [ProfileController::class, 'changePassword'])->name('user-password');
    Route::post('/profile_user/updateAvatar', [ProfileController::class, 'updateAvatar'])->name('user-avatar');

    Route::get('/booking/{id}', [BookingController::class, 'bookingForm'])->name('booking');
    Route::post('/booking/{id}', [BookingController::class, 'booking'])->name('booking.store');

    Route::post('/booking/confirm/{id}', [BookingController::class, 'confirmBooking'])->name('booking.confirm');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
});


Route::post('/logout', [RegisterController::class, 'logout'])->name("logout");

Route::get('/session-test', function () {
    session(['key' => 'value']);
    return session('key');
});


Route::get('/test-curl', function () {
    $ch = curl_init("https://google.com");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return 'Lỗi cURL: ' . curl_error($ch);
    } else {
        return 'Thành công!';
    }
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
