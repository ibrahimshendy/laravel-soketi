<?php

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

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

Route::group([
    'middleware' => 'auth'
], function() {
    Route::get('chat', [\App\Http\Controllers\ChatController::class, 'index'])->name('chat');
    Route::post('chat/messages', [\App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.messages.create');
});

Route::get('login', \App\Http\Controllers\LoginController::class)->name('login');