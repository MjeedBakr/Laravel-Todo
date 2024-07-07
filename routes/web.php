<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::get('/', [TodoController::class, 'index']);
Route::get('create', [TodoController::class, 'create']);
Route::post('store-data', [TodoController::class, 'store']);
Route::get('details/{todo}', [TodoController::class, 'details']);
Route::get('details/edit/{todo}', [TodoController::class, 'edit']);
Route::post('update/{todo}', [TodoController::class, 'update']);
Route::get('delete/{todo}', [TodoController::class, 'delete']);
