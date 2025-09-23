<?php

use App\Http\Controllers\OfferedJobController;
use Illuminate\Support\Facades\Route;

Route::resource('offered_jobs', OfferedJobController::class)
    ->only(['index']);
