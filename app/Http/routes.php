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

Route::get('/', function () {
    return view('home');
});

Route::get('/eligibility', function () {
    return view('eligibility');
});

Route::get('/guidelines', function () {
    return view('guidelines');
});

Route::get('/paper', function () {
    return view('paper');
});

Route::get('/poster', function () {
    return view('poster');
});

#Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

#Process login form
Route::post('/login', 'Auth\AuthController@postLogin');


#Confirm login works by accessing the authenticated user via the Auth facade
Route::get('/confirm-login-worked', function() {
  $user = Auth::user();

  if($user) {
    echo 'You are logged in.';
    dump($user->toArray());
    } else
    {
    echo 'You are not logged in.';
    }
});

#Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

#Confirm user is logged out
//Route::post('/logout/confirm', function(){
//    return('You have been logged out.');
//});

#Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

#Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');


Route::group(['middleware' => 'auth'], function() {
  Route::get('/research/add', 'IOCController@getCreateResearch');
  Route::post('/research/add', 'IOCController@postCreateResearch');

  Route::get('/research/show', 'IOCController@getShowResearch');
  Route::post('/research/show', 'IOCController@postShowResearch');
  Route::get('/research/edit', 'IOCController@getEditResearch');
  Route::post('/research/edit', 'IOCController@postEditResearch');

  Route::get('/research/delete', 'IOCController@getConfirmDelete');
  Route::post('/research/delete', 'IOCController@postDoDelete');

  Route::get('/authors/add', 'IOCController@getCreateAuthors');
  Route::post('/authors/add', 'IOCController@postCreateAuthors');
});


