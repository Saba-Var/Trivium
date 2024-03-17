<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {
		Route::post('log-out', 'logout')->name('auth.log-out');
	});
});

Route::group(['controller' => AuthController::class, 'prefix' => 'auth'], function () {
	Route::post('sign-up', 'signUp')->name('auth.sign-up');
	Route::post('log-in', 'logIn')->name('auth.log-in');
	Route::get('email/verify/{id}/{hash}', 'emailVerify')->middleware(['auth', 'signed'])->name('verification.verify');
});
