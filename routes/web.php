<?php

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\HeadingBanner\HeadingBannerController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\LatestNews\LatestNewsController;
use App\Http\Controllers\Portal\PortalController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', function () {
    if(auth()->check()) {
        return redirect('dashboard');
    }


    return view('welcome');
});

Route::get('/', [PortalController::class, 'index'])->name('portal');
Route::get('/mct-payment-services', [PortalController::class, 'mctPaymentServices'])->name('mct-payment-services');

Route::get('lang', [LanguageController::class, 'change'])->name("change.lang");

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('roles', RoleController::class)->except('show');
    Route::resource('users', UserController::class)->except('show');

    Route::resource('heading-banners', HeadingBannerController::class)->except('show')->names('portal.heading-banners');
    Route::resource('clients', ClientController::class)->except('show')->names('portal.clients');
    Route::resource('latest-news', LatestNewsController::class)->except('show')->names('portal.latest-news');

});
