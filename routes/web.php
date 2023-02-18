<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

#Todo
Route::get('/', [TodoController::class, "index"]);
Route::post('/', [TodoController::class, "create"]);
Route::delete('/{id}', [TodoController::class, "destroy"]);