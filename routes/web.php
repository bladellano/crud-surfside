<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-student','StudentController@addStudent');
Route::post('/add-student','StudentController@storeStudent')->name('student.store');
Route::get('/all-students','StudentController@students');
Route::get('/edit-student/{id}','StudentController@editStudent');
Route::post('/update-student','StudentController@updateStudent')->name('student.update');
Route::get('/delete-student/{id}','StudentController@deleteStudent');