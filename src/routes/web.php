<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Models\Category;
use App\Models\Todo;
use Whoops\Run;

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


Route::post('/todos', [TodoController::class,'store']);
Route::get('/',[TodoController::class,'index']);
Route::patch('/todos/update',[TodoController::class,'update']);
Route::delete('/todos/delete',[TodoController::class,'destroy']);
Route::get('/todos/search',[TodoController::class,'search']);


Route::get('/categories',[CategoryController::class,'index']);
Route::post('/categories',[CategoryController::class,'store']);
Route::patch('/categories/update', [CategoryController::class,'update']);
Route::delete('/categories/delete', [CategoryController::class,'destroy']);