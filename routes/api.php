<?php

use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\QuizController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {
		Route::post('log-out', 'logout')->name('auth.log-out');
	});
});

Route::group(['prefix' => 'auth'], function () {
	Route::group(['controller' => AuthController::class], function () {
		Route::post('sign-up', 'signUp')->name('auth.sign-up');
		Route::post('log-in', 'logIn')->name('auth.log-in');
		Route::get('email/verify/{id}/{hash}', 'emailVerify')->middleware(['auth', 'signed'])->name('verification.verify');
	});

	Route::group(['controller' => PasswordController::class], function () {
		Route::post('forgot-password', 'forgotPassword')->middleware('guest')->name('password.email');
		Route::post('reset-password', 'resetPassword')->middleware('guest')->name('password.update');
	});
});

Route::group(['controller' => CategoryController::class], function () {
	Route::get('/categories', 'index')->name('categories.index');
});

Route::group(['controller' => QuizController::class], function () {
	Route::get('/quizzes', 'index')->name('quizzes.index');
});
