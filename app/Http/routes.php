<?php


use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontController@index');
Route::get('/about-us', 'FrontController@aboutus');
Route::get('/services', 'FrontController@services');
Route::get('/portfolio', 'FrontController@portfolio');
Route::get('/print', 'FrontController@print');
Route::get('/tv', 'FrontController@tv');
Route::get('/radio', 'FrontController@radio');
Route::get('/clients', 'FrontController@clients');
Route::get('/awards', 'FrontController@awards');
Route::get('/meet-team', 'FrontController@teams');
Route::get('/reset', 'FrontController@reset');
Route::get('/register', 'FrontController@register');
Route::resource("/teams","TeamController@create");

// Route::auth();
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login')->name('login');
Route::get('logout', 'Auth\AuthController@logout');

// Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    //Home page group
    Route::resource("/","HomeController");
    Route::get('/{edit}/edit', "HomeController@edit");
    Route::delete('/{edit}', "HomeController@destroy");

    // About us group
    Route::resource("profiles","ProfileController");
    Route::resource("awards","AwardController");
    Route::resource("teams","TeamController");

    //Services
    Route::resource("services","ServiceController");

    // Portfolio
    Route::resource("porfolios","PorfolioController");
    Route::resource("porfolio_tvs","PorfolioTVController");
    Route::resource("porfolio_radios","PorfolioRadioController");
    Route::resource("porfolio_prints","PorfolioPrintController");

    // Clients
    Route::resource("clients","ClientController");

    // Contact
    Route::resource("contacts","ContactController");
});
