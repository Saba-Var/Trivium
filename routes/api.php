<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['controller' => AuthController::class, 'prefix' => 'auth'], function () {
	Route::post('sign-up', 'signUp')->middleware('throttle:3,1')->name('auth.sign-up');
	Route::get('email/verify/{id}/{hash}', 'emailVerify')->middleware(['auth', 'signed'])->name('verification.verify');
});
