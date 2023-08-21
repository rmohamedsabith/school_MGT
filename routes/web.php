<?php

use App\Http\Controllers\schoolController;
use App\Models\school;
use App\Models\student;
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

Route::get('/',[schoolController::class,'index','back'])->name('home');
Route::get('/add',[schoolController::class,'create'])->name('add');
Route::post('/add/store',[schoolController::class,'store'])->name('save');
Route::get('/{student}',[schoolController::class,'show'])->name('view');
Route::get('/edit/{student}',[schoolController::class,'edit'])->name('edit');
Route::put('/edit/{student}/update',[schoolController::class,'update'])->name('update');
Route::delete('/delete/{student}',[schoolController::class,'destroy'])->name('delete');
