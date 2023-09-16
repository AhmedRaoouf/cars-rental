<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BorrowerController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\ForgetController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\ContarctCreateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Auth (Login - Register)
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

// With Google 
Route::get('auth/google', [AuthController::class, "redirectToGoogle"]);
Route::get('auth/google/callback', [AuthController::class, "handleGoogleCallback"]);

// With Facebook
Route::get('login/facebook', [AuthController::class, "redirectToFacebook"]);
Route::get('login/facebook/callback', [AuthController::class, "handleFacebookCallback"]);

// Forget Password
Route::post('/forgot', [ForgetController::class, 'forgot']);
Route::post('/otp/{otp}', [ForgetController::class, 'otp']);
Route::post('/reset/{otp}', [ForgetController::class, 'reset']);


// Rent Steps 
// 1- Borrower send request / Borrower cancel request
// 2- Owner Accept request / Owner reject request
// 3- Borrower Pay the amount 
// 4- Owner Deliver car key 
// 5- Owner upload 6 photos of car and contract 
// 6- Borrower upload contract 
// 7- At the end of rent Borrwoer upload 6 photos of car 


// Wallet 
// transactions 
Route::post('pay/callback',[BorrowerController::class, 'paymentcallback']);



Route::middleware('Api_auth')->group(function () {

    // Logout
    Route::post('logout', [AuthController::class, 'logout']);

    // Switch Roles (Owner <--> Borrower)
    Route::post('switch', [RoleController::class, 'switch']);
    Route::get('role', [RoleController::class, 'role']);


    // Active Account 

    Route::post('owneractive', [OwnerController::class, 'owneractive'])->middleware('Api_owner');
    Route::post('borroweractive', [BorrowerController::class, 'borroweractive'])->middleware('Api_borrower');


    // Profile
    Route::get('show', [ProfileController::class, 'show']);
    Route::post('edit', [ProfileController::class, 'edit']);
    Route::delete('delete', [ProfileController::class, 'delete']);
    Route::post('update_password', [ProfileController::class, 'update_password']);




    Route::middleware('Api_active')->group(function () {


        // (5) Information 
        Route::get('car_info', [CarController::class, 'car_info']);
        Route::get('car_governorates', [CarController::class, 'car_governorates']);
        Route::get('car_cities/{governorate_id}', [CarController::class, 'car_cities']);
        Route::get('car_plans', [CarController::class, 'car_plans']);
        Route::get('car_brands', [CarController::class, 'car_brands']);
        Route::get('car_models/{brand_id}', [CarController::class, 'car_models']);

        // Owner

        Route::middleware('Api_owner')->group(function () {
            // (1) Home 
            Route::get('newcars', [OwnerController::class, 'newcars']);

            // (2) Wallet 


            // (3) Rental Cars 
            Route::get('Rentalcars', [OwnerController::class, 'Rentalcars']);


            //  (4) List Car
            Route::post('create', [CarController::class, 'create']);




            // (5) Rent Car Steps
            Route::post('accept/{id}', [OwnerController::class, 'accept']);
            Route::post('reject/{id}',[OwnerController::class, 'reject']);
            Route::post('deliver/{id}',[OwnerController::class, 'deliver']);


        });


        // Borrower
        Route::middleware('Api_borrower')->group(function () {
            // (1) Home (All - Search - Filter)
            Route::get('allcars', [BorrowerController::class, 'all']);
            Route::get('filter', [BorrowerController::class, 'filter']);
            Route::get('search', [BorrowerController::class, 'search']);


            // (2) Wallet


            // (3) Car Informaion
            Route::get('show/{id}', [CarController::class, 'show']);
            Route::post('review/{id}', [CarController::class, 'review']);

            // (4) Rent Car Steps
            Route::post('send/{id}', [BorrowerController::class, 'send']);
            Route::post('cancel/{id}', [BorrowerController::class, 'cancel']);




            // (4) Borrowing Cars
            Route::get('borrowingcars', [BorrowerController::class, 'borrowingcars']);


        });
    });
});
