<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProjectController::class)
    ->prefix('/projects')
    ->group(function (){
        Route::get('/', 'index')->name('projects.index');
        Route::get('/create', 'createView')->name('projects.createView');
        Route::post('/create', 'create')->name('projects.create');
        Route::post('/delete/{id}', 'delete')->name('projects.delete');
    });
