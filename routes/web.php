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

    // put the entries as an array of the sections
    $cv_sections = \App\Models\CvSection::orderBy('priority', 'DESC')->get()->toArray();
    foreach ($cv_sections as $key => $cv_section_arr) {
        $cv_sections[$key]['entries'] =
        \App\Models\CvEntry::where('cv_section_id', $cv_sections[$key]['id'])
        ->orderBy('start_date', 'DESC')->get();
    }

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
    'cv_data'=>$cv_sections,
    'skills_arr'=>$skills_arr]);
})->name('home');

Route::get('/test', function () {
    /*
    $projects = \App\Models\Project::get();
    foreach ($projects as $project) {
        $project->save();
    }
    */
});

Route::get('/project-details/{slug}', function ($slug) {
    $user = \App\Models\User::where('id', 1)->first();
    $project = \App\Models\Project::where('slug', $slug)->first();

    $skill_arr = $project->skillArr();

    return view('project-details', ['user'=>$user, 'project'=>$project, 'skill_arr'=>$skill_arr]);
})->name('project-details');
