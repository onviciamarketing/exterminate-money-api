<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/getcharacter', [HomeController::class, 'getcharacter']);

Route::get('/moveplayer', [HomeController::class, 'moveplayer']);

Route::get('/getcreatures', [HomeController::class, 'getcreatures']);

Route::get('/getcharacterbyid/{userid}', [HomeController::class, 'getcharacterbyid']);


// Route::get('/getdata', [HomeController::class, 'getdata']);

// Route::get('/countrys', [HomeController::class, 'countrys']);

// Route::post('/getdatapost', [HomeController::class, 'getdatapost']);

// Route::get('/totaleventsnow', [HomeController::class, 'totaleventsnow']);
