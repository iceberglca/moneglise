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
    return view('Auth\login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/eglises',[
    'as'=>'eglises',
    'uses'=>'EgliseController@lister_eglise'

])->middleware('auth');
Route::get('/save_eglise',[
    'as'=>'save_eglise',
    'uses'=>'EgliseController@save_eglise'

])->middleware('auth');

Route::get('/modifier_eglise/{id}',[
    'as'=>'modifier_eglise',
    'uses'=>'EgliseController@modifier_eglise'

])->middleware('auth');
Route::get('/supprimer_eglise/{id}',[
    'as'=>'supprimer_eglise',
    'uses'=>'EgliseController@supprimer_eglise'

])->middleware('auth');
Route::get('/update_eglise',[
    'as'=>'update_eglise',
    'uses'=>'EgliseController@update_eglise'

])->middleware('auth');

//pour les fidels

Route::get('/fideles',[
    'as'=>'fideles',
    'uses'=>'FideleController@lister_fideles'

])->middleware('auth');
Route::get('/gestion_fidele',[
    'as'=>'gestion_fidele',
    'uses'=>'FideleController@gestion_fidele'

])->middleware('auth');
Route::get('/test_picker',[
    'as'=>'test_picker',
    'uses'=>'FideleController@test_picker'

])->middleware('auth');
Route::get('/save_fidele',[
    'as'=>'save_fidele',
    'uses'=>'FideleController@save_fidele'

])->middleware('auth');