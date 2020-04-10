<?php

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
    return view('welcome');
});

Auth::routes();
Route::get('/admin', 'Admin\HomeController@index')->name('home');

Route::middleware('auth')->namespace('Admin')->prefix('admin')->group( function() {
    Route::resource('professor', 'ProfessorController');
    Route::resource('curso', 'CursoController');
    Route::resource('aluno', 'AlunoController');
    Route::get('relatorio', 'PdfController@index');
});
