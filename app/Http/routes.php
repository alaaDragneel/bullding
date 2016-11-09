<?php

/*
     /admin routes
*/
Route::group(['middleware' => 'admin'], function () {

     Route::group(['prefix' => '/admin'], function() {

          #dat table ajax

          Route::get('/users/data', [
               'uses' => 'UsersController@anyData',
               'as' => 'user.data'
          ]);

          Route::get('/', [
               'uses' => 'AdminController@getAdminIndex',
               'as' => 'dashboard'
          ]);

          Route::get('/dashboard', [
               'uses' => 'AdminController@getAdminIndex',
               'as' => 'dashboard'
          ]);

          Route::resource('/users', 'UsersController', [
               'names' => [
                    'index' => 'users',
                    'create' => 'add.user',
                    'store' => 'create.user',
                    'edit' => 'edit.user',
                    'update' => 'update.user'
               ]
          ]);

          Route::get('/users/{user_id}/delete', [
               'uses' => 'UsersController@destroy',
               'as' => 'delete.user'
          ]);


          Route::get('/site_setting', [
               'uses' => 'siteSettingController@index',
               'as' => 'siteSetting'
          ]);

          Route::post('/site_setting/update', [
               'uses' => 'siteSettingController@store',
               'as' => 'siteSetting.update'
          ]);


     });
});


/*
     /user routes
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::auth();

Route::get('/home', [
     'uses' => 'HomeController@index',
     'as' => 'home'
]);
