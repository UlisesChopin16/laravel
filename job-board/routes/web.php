<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('', fn() => to_route('offered_jobs.index'));

Route::resource('offered_jobs', OfferedJobController::class)
    ->only(['index', 'show']);

Route::get('login', fn() => to_route('auth.create'))
    ->name('login');

Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

Route::delete('logout', fn() => to_route('auth.destroy'))
    ->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::middleware('auth')->group(function () {
    Route::resource('offered_jobs.application', JobApplicationController::class)
        ->only(['create', 'store']);

    Route::resource('my-job-applications', MyJobApplicationController::class)
        ->only(['index', 'destroy']);

    // Route::resource('employer', EmployerController::class)
    //     ->only(['create', 'store']);

    // Route::middleware('employer')
    //     ->resource('my-jobs', MyJobController::class);
});
