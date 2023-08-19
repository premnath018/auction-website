<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;

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


/*
|--------------------------------------------------------------------------
| Login and Sign Up Routes
|--------------------------------------------------------------------------
*/

// Google Login ↓

Route::name('google.')->group( function() {
    Route::get('auth/google',[LoginController::class,'loginWithGoogle'])->name('login');
    Route::get('auth/google/callback',[LoginController::class,'handleGoogleCallback'])->name('callback');
});

// Twiiter Login (Temporarily Down ) ↓

Route::name('twitter.')->group( function() {
    Route::get('auth/twitter',[LoginController::class,'loginWithTwitter'])->name('login');
    Route::get('auth/twitter/callback',[LoginController::class,'handleTwitterCallback'])->name('callback');
});

// User Registration  Form  ↓

Route::post('/submit-registration', [LoginController::class, 'submitRegistration'])->name('submit.registration');
Route::get('/auth/sign-up', function () { return view('/auth-auction/sign-up');}) -> name('auth.signup');

// Login Page ↓

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', function () { return view('/auth-auction/sign-in');})->name('auth.login');

// Forgot Password Page and Post  ↓

Route::get('/forgot-password', function () { return view('/auth-auction/forgot-password');})->name('auth.forgot');
Route::post('/forgot-password', [LoginController::class,'forgotPassword'])->name('auth.forgot-password');


// Reset Password Page 
Route::get('/reset/{token}', [LoginController::class,'resetPassword']);
Route::post('/reset/{token}', [LoginController::class,'resetPasswordPost']);

Route::get('/reset-password', function () {return view('/auth-auction/reset-password');});

// Logout Page ↓

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Primary Page (Dashboard Page)

Route::middleware('auth')->group(function () {
    Route::get('/', function () { return view('index');})->name('dashboard');
    // Add other dashboard-related routes here
});

/*
|--------------------------------------------------------------------------
| Dashboard and Process Routes
|--------------------------------------------------------------------------
*/

// Index Page

Route::get('/dashboard',function(){ return view('index');})->name('dashboard');




