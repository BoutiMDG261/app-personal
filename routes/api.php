<?php

use App\Http\Controllers\api\PersonalController;
use Illuminate\Support\Facades\Route;

Route::get('/add-personal', [PersonalController::class, 'store']);
