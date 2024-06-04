<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContractController;

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
        Route::get('/update/{id}/edit', 'updateView')->name('contracts.updateView');
        Route::post('/update/{id}', 'update')->name('contracts.update');
    });


Route::controller(ContractController::class)
    ->prefix('/contracts')
    ->group(function (){
        Route::get('/', 'index')->name('contracts.index');
        Route::get('/create', 'createView')->name('contracts.createView');
        Route::post('/create', 'create')->name('contracts.create');
        Route::post('/delete/{id}', 'delete')->name('contracts.delete');

    });
