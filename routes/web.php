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

Route::get('/upload', 'App\Http\Controllers\ExcelController@fileImportExport')->name('upload.form');
Route::post('/import-excel', 'App\Http\Controllers\ExcelController@fileImport')->name('file-import');
Route::get('file-export', [ExcelController::class, 'fileExport'])->name('file-export');

