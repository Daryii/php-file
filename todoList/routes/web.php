<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/saveItemRoute", [TodoListController::class, "saveItem"])->name("saveItem");
