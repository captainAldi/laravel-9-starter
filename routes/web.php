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


// For Testing Purpose
Route::get('/active/page1', function () {
    return view('home', [
       'page' => 'ini page 1'
    ]);
})->name('active.page1');

Route::get('/active/page2', function () {

    return view('home', [
       'page' => 'ini page 2'
    ]);
})->name('active.page2');