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
    $skills_db = \App\Models\Skill::where('user_id', $user->id)
    ->join('skill_groups as sg', 'skills.skill_group_id', '=', 'sg.id')
    ->orderBy('sg.updated_at', 'DESC')->orderBy('progress', 'DESC')
    ->select('sg.name as sg_name', 'skills.*')->get();

    $skills_arr = [];
    foreach ($skills_db as $sdb) {
        if (!array_key_exists($sdb->sg_name, $skills_arr)) {
            $skills_arr[$sdb->sg_name] = array();
        }
        array_push($skills_arr[$sdb->sg_name], $sdb);
    }

    return view('index', ['user'=>$user, 'projects'=>$projects,
    'work_experiences'=>$work_experiences, 'education'=>$education,
    'skills_arr'=>$skills_arr]);
})->name('home');

Route::get('/project-details/{id}', function ($id) {
    $user = \App\Models\User::where('id', 1)->first();
    $project = \App\Models\Project::where('id', $id)->first();

    $skill_arr = $project->skillArr();

    return view('project-details', ['user'=>$user, 'project'=>$project, 'skill_arr'=>$skill_arr]);
})->name('project-details');
