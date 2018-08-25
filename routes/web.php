<?php

use Illuminate\View\View;

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

Route::get('/ciam', function () {
    //return View::make('ciam.index');
    return view('ciam.index');
});

Route::get('/authenticate', function () {
    Forrest::authenticate();
    //return Forrest::query('SELECT Id FROM Account');
    return Redirect::to('/');
});

Route::get('/account', function () {
    $loginURL = 'https://test.salesforce.com';
    Forrest::authenticate($loginURL);
    return Forrest::query('SELECT Id FROM Account');

});

Route::get('/id', function () {
    $loginURL = 'https://test.salesforce.com';
    Forrest::authenticate($loginURL);
    $response = Forrest::identity();
    $content = (string)$response->getBody(); // Guzzle response
    /*
    Event::listen('forrest.response', function ($request, $response) {
        dd((string)$response);
    }); */

});