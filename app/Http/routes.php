<?php

/*
/admin routes
*/
Route::group(['middleware' => 'admin'], function () {

  Route::group(['prefix' => '/admin'], function() {

    #datatable ajax

    Route::get('/users/data', [
      'uses' => 'UsersController@anyData',
      'as' => 'user.data'
    ]);

    Route::get('/bullding/data', [
      'uses' => 'BulldingController@anyData',
      'as' => 'bullding.data'
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

      Route::resource('/bulldings', 'BulldingController');


          Route::get('/bulldings/{id}/delete', [
            'uses' => 'BulldingController@destroy',
            'as' => 'admin.bulldings.destroy'
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
  // show all bullding
  Route::get('/bullding/show/all', [
     'uses' => 'BulldingController@showAllEnabled',
     'as' => 'show.all.bullding'
 ]);
 // show rent bullding
  Route::get('/bullding/show/rent', [
     'uses' => 'BulldingController@showRentEnabled',
     'as' => 'show.rent.bullding'
 ]);
 // show own bullding
  Route::get('/bullding/show/own', [
     'uses' => 'BulldingController@showOwnEnabled',
     'as' => 'show.own.bullding'
 ]);
 // show own bullding
  Route::get('/bullding/show/apartment', [
     'uses' => 'BulldingController@showApartmentEnabled',
     'as' => 'show.apartment.bullding'
 ]);
 // show own bullding
  Route::get('/bullding/show/Shaleh', [
     'uses' => 'BulldingController@showShalehEnabled',
     'as' => 'show.Shaleh.bullding'
 ]);
 // show own bullding
  Route::get('/bullding/show/home', [
     'uses' => 'BulldingController@showHomeEnabled',
     'as' => 'show.home.bullding'
 ]);

 // Search
  Route::post('/bullding/Search', [
     'uses' => 'BulldingController@search',
     'as' => 'search'
 ]);

  Route::get('/home', [
  'uses' => 'HomeController@index',
  'as' => 'home'
  ]);
