
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

      Route::get('/contact/data', [
         'uses' => 'contactController@anyData',
         'as' => 'contact.data'
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
         ],
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

      Route::resource('/bulldings', 'BulldingController', ['except'=> ['index', 'show']]);

      Route::get('/bulldings/{id?}', [
         'uses' => 'BulldingController@index',
         'as' => 'admin.bulldings.index',
      ]);

      Route::get('/bulldings/changeStatus/{id}/{status}', [
         'uses' => 'BulldingController@changeStatus',
         'as' => 'admin.bulldings.changeStatus'
      ]);

      Route::get('/bulldings/{id}/delete', [
         'uses' => 'BulldingController@destroy',
         'as' => 'admin.bulldings.destroy'
      ]);


      Route::resource('/contacts', 'contactController');

      Route::get('/contacts/{id}/delete', [
         'uses' => 'contactController@destroy',
         'as' => 'contact.destroy'
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
Route::get('/bullding/Search', [
   'uses' => 'BulldingController@search',
   'as' => 'search'
]);

// get single bullding
Route::get('/bullding/singleShow/{id}', [
   'uses' => 'BulldingController@singleShow',
   'as' => 'show.single.bullding'
]);

// get ajax bullding information
Route::get('/ajax/bullding/show/', [
   'uses' => 'BulldingController@ajaxInfo',
   'as' => 'show.ajax.bullding'
]);

// get the contact Us
Route::get('/contact', [
   'uses' => 'HomeController@contactUs',
   'as' => 'show.contact'
]);

// post the message
Route::post('/contact', [
   'uses' => 'contactController@store',
   'as' => 'send.contact'
]);

Route::get('/home', [
   'uses' => 'HomeController@index',
   'as' => 'home'
]);

// get bullding view
Route::get('/users/bullding/create/', [
   'uses' => 'BulldingController@usersAddView',
   'as' => 'users.create.bullding',
   'middleware' => 'auth',
]);

// post bullding
Route::post('/users/bullding/create/', [
   'uses' => 'BulldingController@usersStore',
   'as' => 'users.store.bullding',
   'middleware' => 'auth',
]);

// get the users bullding
Route::get('/user/show/bullding/', [
   'uses' => 'BulldingController@usersBullding',
   'as' => 'user.show.bullding',
   'middleware' => 'auth',
]);

// get the users approved bullding
Route::get('/user/show/bullding/approved', [
   'uses' => 'BulldingController@usersApprovedBullding',
   'as' => 'user.show.bullding.approved',
   'middleware' => 'auth',
]);

// get the users unappreved bullding
Route::get('/user/show/bullding/unappreved', [
   'uses' => 'BulldingController@usersUnApprovedBullding',
   'as' => 'user.show.bullding.unappreved',
   'middleware' => 'auth',
]);

// get the users edit unappreved bullding
Route::get('/user/edit/bullding/unappreved/{id}', [
   'uses' => 'BulldingController@usersEditUnApprovedBullding',
   'as' => 'user.edit.bullding.unappreved',
   'middleware' => 'auth',
]);

// get the users edit unappreved bullding
Route::post('/user/update/bullding/unappreved', [
   'uses' => 'BulldingController@usersUpdateUnApprovedBullding',
   'as' => 'user.update.bullding.unappreved',
   'middleware' => 'auth',
]);

// get the users profile
Route::get('/user/editSetting', [
   'uses' => 'UsersController@userEditSetting',
   'as' => 'user.editSetting',
   'middleware' => 'auth',
]);

// patch the user profile
Route::patch('/user/editSetting/update', [
   'uses' => 'UsersController@userUpdateProfile',
   'as' => 'user.updateProfile',
   'middleware' => 'auth',
]);
