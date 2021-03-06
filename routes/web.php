<?php

use App\Http\Controllers\DivisionController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [DivisionController::class, 'index']);
Route::get('/division/{id}', [DivisionController::class, 'divisionGeneration']);
Route::get('/playoff/{id}', [DivisionController::class, 'playoffGeneration']);
