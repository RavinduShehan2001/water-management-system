<?php

use App\Http\Controllers\SystemController;
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

Route::get('/', function () {
    return view(' welcome');
});

Route::get('/', [SystemController::class, 'index']);
Route::post('/store', [SystemController::class, 'store'])->name('store');
// Route::get("/", [SystemController::class, 'lastRowTotal'])->name('lastRowTotal');
