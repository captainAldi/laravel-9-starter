<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Add Verify Page to Auth Scaffolding
Auth::routes(['verify' => true]);

// Route::middleware(['verified'])->group(function () {

//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// });

// Prefix Group for /admin 
Route::prefix('admin')->group(function () {
    
    // Middleware Check
    Route::middleware(['auth', 'verified', 'user-access:admin'])->group(function () {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    
    });


});

// Prefix Group for /user 
Route::prefix('user')->group(function () {
    
    // Middleware Check
    Route::middleware(['auth', 'verified', 'user-access:user'])->group(function () {
        
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');

    });


});
