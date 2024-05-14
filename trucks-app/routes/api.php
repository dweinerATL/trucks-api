<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;

Route::get('/find/{type}', [TruckController::class, 'find']);
