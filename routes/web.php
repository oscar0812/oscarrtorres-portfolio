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
    $skills_db = \App\Models\Skill::where('user_id', $user->id)->orderBy('progress', 'DESC')->get();

    // group skills by skill group (to seperate into cols)
    $skills_arr = [];
    $skill_group_names = [];
    foreach ($skills_db as $skill_db) {
        if (!array_key_exists($skill_db->skill_group_id, $skills_arr)) {
            $skills_arr[$skill_db->skill_group_id] = array();
            $skill_group_names[$skill_db->skill_group_id] = $skill_db->skill_group->name;
        }

        array_push($skills_arr[$skill_db->skill_group_id], $skill_db);
    }

    ksort($skills_arr);

    return view('index', ['user'=>$user, 'projects'=>$projects,
    'work_experiences'=>$work_experiences, 'education'=>$education,
    'skills_arr'=>$skills_arr, 'skill_group_names'=>$skill_group_names]);
})->name('home');

Route::get('/project-details/{id}', function ($id) {
    $user = \App\Models\User::where('id', 1)->first();
    $project = \App\Models\Project::where('id', $id)->first();
    return view('project-details', ['user'=>$user, 'project'=>$project]);
})->name('project-details');
