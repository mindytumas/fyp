<?php

use Carbon\Carbon;
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

//Route::get('/', function () {
    //return view('welcome');
//});


Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'MemberController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');




//Route::get('{path}', "HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?');




//Route::get('/memberStatus', 'MemberController@index1');





//Route::get('/home', 'MemberController@index')->name('admindashboard');


Auth::routes();

// Password Reset Routes
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/email', 'Auth\ResetPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

    Route::get('/memberform', function () {
        return view('memberform');

    });


Route::get('/message', 'MessageController@messages');

    
    Route::resource('members', 'MemberController');

    Route::get('/members', [
        'uses' => 'MemberController@index',
        'as' => 'members.detail'
    ]);
    

    //Route::get('/members', 'MemberController@index');
    Route::get('/search', 'MemberController@search');
    Route::get('/search1', 'MemberController@search1');

    Route::get('/getPDF', 'PDFController@getPDF');
    Route::get('/generateReport', 'MemberController@generateReport');
    Route::get('/home', 'HomeController@index');
    Route::get('/updateStatus', 'MemberController@updateStatus');
    Route::get('/editStatus/{$id}', 'MemberController@editStatus');
    
    Route::get('/membershipdetails', [
        'uses' => 'MemberController@index2',
        'as' => 'membership.detail'
    ]);
    
    //Route::get('/membershipdetails', 'MemberController@index2');
    //Route::get('/admindashboard', 'MemberController@getTotalActive');
    Route::get('/updateInactive/{id}', 'MemberController@updateInactive');
    

    Route::get('/excel_export', 'ExportExcelController@index');

    Route::get('/excel_export/excel', 'ExportExcelController@excel')->name('export_excel.excel');

//});
Route::get('/test', function(){
    return App\User::find(1)->profile;
});

//Route::post('/addProfile', [
    //'uses' => 'ProfileController@create',
    //'as' => 'superadmin.index'
//]);

Route::group(['prefix' => 'admin' ,'middleware' => 'auth'], function(){


Route::get('/users', [
    'uses' => 'UsersController@index',
    'as' => 'users'
]);

Route::get('/user/create', [
    'uses' => 'UsersController@create',
    'as' => 'user.create'
]);

Route::post('/user/store', [
    'uses' => 'UsersController@store',
    'as' => 'user.store'
]);

Route::get('user/admin/{id}', [
    'uses' => 'UsersController@admin',
    'as' => 'user.admin'
]);

Route::get('user/notadmin/{id}', [
    'uses' => 'UsersController@notadmin',
    'as' => 'user.not.admin'
]);
});

Route::get('user/profile', [
    'uses' => 'ProfilesController@index',
    'as' => 'user.profile'
]);

Route::post('/user/profile/update', [
    'uses' => 'ProfilesController@update',
    'as' => 'user.profile.update'
]);

Route::get('user/delete/{id}', [
    'uses' => 'UsersController@destroy',
    'as' => 'user.delete'
]);
Route::get('/makeactive/{id}', [
    'uses' => 'MemberController@makeactive',
    'as' => 'memberstatus.active'
]);
Route::get('/makenotactive/{id}', [
    'uses' => 'MemberController@notactive',
    'as' => 'memberstatus.notactive'
]);
Route::get('/inactive', [
    'uses' => 'MemberController@inactive',
    'as' => 'memberstatus.inactive'
]);
Route::post('/renew/{id}', [
    'uses' => 'MemberController@renew',
    'as' => 'memberstatus.renew'
]);
Route::get('/pendingmakeactive/{id}', [
    'uses' => 'MemberController@pendingmakeactive',
    'as' => 'memberstatus.pendingmakeactive'
]);

Route::get('/get-post-chart-data', 'ChartDataController@getMonthlyPostData');

