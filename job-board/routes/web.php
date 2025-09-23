<?php

use App\Http\Controllers\OfferedJobController;
use Illuminate\Support\Facades\Route;


Route::get('', fn() => to_route('offered_jobs.index'));

Route::resource('offered_jobs', OfferedJobController::class)
    ->only(['index', 'show']);
