<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthAdminController;
use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PDFViewerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\WeddingRegistrationController;
use Illuminate\Support\Facades\Auth;

Route::group(['domain' => 'admin.' . env('DOMAIN')], function () {
    Route::controller(AuthAdminController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginProcess');
        Route::get('forgot-password', 'forgotPassword');
        Route::post('forgot-password', 'sendResetEmail');
        Route::get('logout', 'logout');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'dashboard');
            Route::get('dashboard', 'dashboard');
        });

        Route::prefix('administrators')->controller(AdminController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('users')->controller(UserController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('news')->controller(NewsController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('galleries')->controller(GalleryController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('registrations')->controller(WeddingRegistrationController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('verification/{id}', 'verification');
            Route::post('verification', 'verify');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('weddings')->controller(WeddingController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('schedule')->controller(ScheduleController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });
    });
});

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index');
});

Route::controller(AuthUserController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginProcess');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerProcess');
    Route::get('forgot-password', 'forgotPassword');
    Route::post('forgot-password', 'sendResetEmail');
    Route::get('logout', 'logout');

    Route::controller(SocialiteController::class)->group(function () {
        Route::get('login/{provider}', 'redirectToProvider');
        Route::get('login/{provider}/callback', 'handleProviderCallback');
    });
});

Route::get('pdf', [PDFViewerController::class, 'pdf']);

Route::prefix('u')->middleware('auth:user')->controller(RegistrationController::class)->group(function () {
    Route::get('/', function () {
        return redirect('u/starter');
    });

    Route::get('starter', 'starter');
    Route::post('starter/store', 'storeStarter');
    Route::get('personal', 'personal');
    Route::post('personal/store', 'storePersonal');
    Route::get('partner', 'partner');
    Route::post('partner/store', 'storePartner');
    Route::get('requirements', 'requirements');
    Route::post('requirements/store', 'storeRequirements');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'profileUser');
        Route::post('create-password', 'createPassword');
        Route::post('change-password', 'changePassword');
    });
});
