<?php

use App\Http\Controllers\dashboard\AuthController;
use App\Http\Controllers\dashboard\BorrowerController as DashoardBorrowerController;
use App\Http\Controllers\dashboard\CarController as DashoardCarController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\OwnerController as DashoardOwnerController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PaymobController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,'index']);
Route::get('/store', [HomeController::class,'store']);
Route::get('/list', [HomeController::class,'list']);
Route::get('/addingcar', [HomeController::class,'addingcar']);


Route::get('/pay/{rent_id}', [PaymobController::class, 'pay']);









Route::get('/loginform', [AuthController::class,'loginform']);
Route::post('/login',[AuthController::class,'login']);
// Route::get('/forget',[AuthController::class,'forget']);
// Route::post('/forget-pass',[AuthController::class,'authPhone']);
// Route::get('/reset_route',[AuthController::class,'reset_route']);
// Route::post('/reset-password',[AuthController::class,'reset']);

Route::get('/logout',[AuthController::class,'logout']);


Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth','can-enter-dashboard']);

Route::prefix('dashboard')->middleware(['auth','can-enter-dashboard'])->group(function () {
    
    Route::get('/owners',[DashoardOwnerController::class,'index']);

    Route::get('/borrowers',[DashoardBorrowerController::class,'index']);

    Route::get('/cars',[DashoardCarController::class,'index']);



});
// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('auth/google', [AuthController::class,"redirectToGoogle"]);
// Route::get('auth/google/callback', [AuthController::class,"handleGoogleCallback"]);

// Route::get('login/facebook', [AuthController::class,"redirectToFacebook"]);
// Route::get('login/facebook/callback', [AuthController::class,"handleFacebookCallback"]);



