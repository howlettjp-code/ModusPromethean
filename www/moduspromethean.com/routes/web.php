<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssistantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Public marketing site
|
*/

Route::get('/', function () {
    return view('home'); // resources/views/home.blade.php
})->name('home');

Route::get('/product', function () {
    return view('product'); // resources/views/product.blade.php
})->name('product');

Route::get('/how-it-works', function () {
    return view('how'); // resources/views/how.blade.php
})->name('how');

Route::get('/about', function () {
    return view('about'); // resources/views/about.blade.php
})->name('about');

Route::get('/investors', function () {
    return view('investors'); // resources/views/investors.blade.php
})->name('investors');

Route::get('/contact', function () {
    return view('contact'); // resources/views/contact.blade.php
})->name('contact');

/*
|--------------------------------------------------------------------------
| Authentication (stub views for now)
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login'); // resources/views/auth/login.blade.php
})->name('login');

Route::get('/signup', function () {
    return view('auth.signup'); // resources/views/auth/signup.blade.php
})->name('signup');

/*
|--------------------------------------------------------------------------
| Assistant / AI Counterpart routes
|--------------------------------------------------------------------------
|
| Wizard + advanced settings for "your AI counterpart"
|
*/

// Step 1: mandatory naming / basic info
Route::get('/assistant/new', [AssistantController::class, 'create'])
    ->name('assistants.create');

Route::post('/assistant', [AssistantController::class, 'store'])
    ->name('assistants.store');

// Wizard flow (multi-step config)
Route::get('/assistant/{assistant}/wizard', [AssistantController::class, 'wizard'])
    ->name('assistants.wizard');

// “Explore settings on my own” / advanced edit screen
Route::get('/assistant/{assistant}/settings', [AssistantController::class, 'edit'])
    ->name('assistants.edit');
