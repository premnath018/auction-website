<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuctionController;

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

// Route::get('/reset-password', function () {return view('/auth-auction/reset-password');});    -> No Use

// Email Verification

Route::post('/email-verification',[UserController::class,'verifyEmail'])->name('verify.email');
Route::get('/email-verification',function () { return view('/auth-auction/verify-email');})->name('verify.emai');
Route::get('/verifyEmail/{token}', [UserController::class,'verifyEmailPost']);


Route::get('/test',function () { return view('user-profile');});

// Logout Page ↓

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {


    // Primary Page (Dashboard Page)

    Route::get('/home',[AuctionController::class,'index'])->name('dashboard');

    Route::get('/', [AuctionController::class,'index'])->name('dashboard');

    // User Profile Page

    Route::get('/profile',[UserController::class,'viewProfile' ])->name('user.profile');

    // User Updation

    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('user.update');

    // Product add page

    Route::get('/create-auction', function () { return view('product-add');})->name('product.add');

    // Product edit page

    Route::get('/edit-auction/{id}',   [ProductController::class, 'edit'])->name('product.edit');

    // Product add page - POST request

    Route::post('/store-auction', [ProductController::class, 'store'])->name('product.store');

    // Product edit page - POST request

    Route::post('/edit-auction/{id}', [ProductController::class, 'editPost'])->name('product.edit');

    // Prodcut Delete Post

    Route::post('/product/delete',  [ProductController::class, 'delete'])->name('product.delete');

    // User Product List
    
    Route::get('/my-listings',  [ProductController::class, 'index'])->name('user.auction.list');

    // Auction Product Details

    Route::get('/auction/{id}', [AuctionController::class, 'AuctionProductDetail'])->name('auction.id');

    // Get Live Auction -> Auction Hub

    Route::get('/auction-hub', [AuctionController::class,'liveAuctions'])->name('auction.hub');

     // Get Upcoming Auction -> My Auction 
     
    Route::get('/upcomings', [AuctionController::class,'upcomingAuctions'])->name('auction.upcoming');

    // Place-Bid 

    Route::post('/place-bid', [AuctionController::class,'placeBid']);

    // Leader Board Get Reuqest

    Route::get('/get-product-leaderboard', [AuctionController::class, 'getProductLeaderboard'])->name('get.product.leaderboard');

    // My Biddings Get Reuqest

    Route::get('/get-user-biddings', [AuctionController::class, 'getUserBiddingsForProduct']);

    // Add other dashboard-related routes here
});

/*
|--------------------------------------------------------------------------
| Dashboard and Process Routes
|--------------------------------------------------------------------------
*/

// Index Page





