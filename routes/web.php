<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('chat');
Route::get('/data', [App\Http\Controllers\DataController::class, 'index'])->name('getdata');

Route::resource('messages', App\Http\Controllers\MessageController::class)->only([
    'index',
    'store'
]);
Route::resource('history', App\Http\Controllers\DataController::class)->only([
    'index',
    'store'
]);

Route::get('/messages/clear', [App\Http\Controllers\MessageController::class, 'clearMessages'])->name('clear-messages');
