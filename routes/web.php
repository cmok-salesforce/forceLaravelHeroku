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

# https://packagist.org/packages/omniphx/forrest
Route::get('/id', function () {
    $loginURL = 'https://test.salesforce.com';
    Forrest::authenticate($loginURL);
    $response = Forrest::identity();
    return $response;
    //$username = $response['username']
});

Route::get('/id1', function () {
    $loginURL = 'https://test.salesforce.com';
    Forrest::authenticate($loginURL);
    $resource= 'Account/describe/';
    $response = Forrest::sobjects($resource, ['format' => 'none']);
    //dd($response);
    //$content = (string)$response->getBody(); // Guzzle response - NOT WORKING
});

Route::get('/sgp1', function () {
    //return view('sfdc.packagebuilder');
});

Route::get('/dd', 'MyDummyController@index');

Route::get('/sgp', 'Sfdc\PackageBuilderController@index');