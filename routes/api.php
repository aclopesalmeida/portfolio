<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/applicant/{lang?}', 'ApplicantsController@index');

Route::get('/jobs', 'JobsController@index');

Route::get('/interests', 'InterestsController@index');

Route::get('/skills', 'SkillsController@index');

Route::post('/contact', 'HomeController@contact');

Route::get('/language', 'HomeController@language');

