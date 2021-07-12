<?php

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
    return view('index');
})->name('home');

Route::get('/cv', function () {
    return view('cv');
})->name('cv');

Route::get('/hire-me', function () {
    return view('hire');
})->name('hire-me');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');
