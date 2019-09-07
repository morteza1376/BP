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
    return view('index');
});
Route::name('dashboard') -> get('/dashboard',function() {
    return view('admin.dashboard');
});

Route::name('about_developers')->get('about_developers',function() {
    return view('common.about_developers');
});

Route::name('about_system')->get('about_system',function() {
    return view('common.about_system');
});

Route::resource('patient', 'PatientController');
Route::resource('bp', 'BPRecordController');
