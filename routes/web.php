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
    $user = \App\Models\User::where('id', 1)->first();
    $projects = \App\Models\Project::where('user_id', $user->id)->orderBy('importance_score', 'DESC')->get();
    $work_experiences = \App\Models\WorkExperience::where('user_id', $user->id)->orderBy('start_date', 'DESC')->get();
    $education = \App\Models\Education::where('user_id', $user->id)->orderBy('start_date', 'DESC')->get();
    $skills = \App\Models\Skill::where('user_id', $user->id)->orderBy('progress', 'DESC')->get();
    return view('index', ['user'=>$user, 'projects'=>$projects, 'work_experiences'=>$work_experiences, 'education'=>$education, 'skills'=>$skills]);
})->name('home');

Route::get('/cv', function () {
    return view('cv');
})->name('cv');

Route::get('/hire-me', function () {
    return view('hire');
})->name('hire-me');
