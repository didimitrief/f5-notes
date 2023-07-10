<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', function () {
    return view('index');
});

Route::get('/notes/create', function () {
    return view('create');
});

Route::get('/notes/{id}/edit', function () {
    return view('edit');
});

Route::get('/notes/{id}', function () {
    return view('show');
});