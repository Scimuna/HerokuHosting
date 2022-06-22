<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlippoController;

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

Route::get('/',[KlippoController::class,'index'])->name('index');
Route::post('/post/create',[KlippoController::class,'create'])->name('create');
Route::post("/otp{otp?}",[KlippoController::class,'otp'])->name('retrieve.otp');
Route::post('/download',[KlippoController::class,'download'])->name('download');

