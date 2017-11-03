<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// use App\Task;
use Illuminate\Http\Request;

Route::group([
    'prefix' => 'auth-admin',

], function ($router) {

    Route::post('login', 'AuthAdminsController@login');

    Route::group([
        'middleware' => ['auth:admin']
    ], function ($router) {
        Route::post('logout', 'AuthAdminsController@logout');
        Route::post('refresh', 'AuthAdminsController@refresh');
        Route::post('me', 'AuthAdminsController@me');
    });
});


Route::group([
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'AuthUsersController@login');

    Route::group([
        'middleware' => ['auth:app']
    ], function ($router) {
        Route::post('logout', 'AuthUsersController@logout');
        Route::post('refresh', 'AuthUsersController@refresh');
        Route::post('me', 'AuthUsersController@me');
    });
});
