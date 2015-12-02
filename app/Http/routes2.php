<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/practice', function () {
   $data = Array('p3' => 'bar');
   Debugbar::info($data);
   Debugbar::error('Error!');
   Debugbar::warning('Watch out...');
   Debugbar::addMessage('Another message', 'mylabel');

   return 'Practice';
});


Route::get('/', function () {
    return view('welcome');
});


# Explicit routes for FakeData
Route::post('/show/{users?}', 'FakerController@showFakedata');


