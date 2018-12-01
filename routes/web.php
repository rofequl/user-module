<?php

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

Route::get('/','UserController@index');    
 
Route::post('/LoginCheck','UserController@LoginCheck');

Route::get('/logout','UserController@Logout')->name('logout');

Route::group(['middleware' => 'AdminMiddleware'], function () {

    Route::get('/dashboard','HomeManagement@index')->name('dashboard');

    /* User Profile Show */

    Route::get('users/{data}/{data1?}','UserController@UserProfile')->name('users');

    /* All User Show, Update, Delete, Status */

    Route::get('/Allusers/{data?}','UserController@AllUsers')->name('Allusers');

    Route::post('/UserUpdate/{data}','UserController@UserUpdate');

    Route::post('/StatusChange','UserController@StoreStatus');

    Route::get('/UserDelete','UserController@UserDelete');

    /* New User Add */

    Route::get('/Addusers','UserController@AddUsers')->name('Addusers');

    Route::post('/AddUserEmailCheck','UserController@EmailCheck');

    Route::post('/AddNewUser','UserController@StoreUser');

    /* User Setting and password Change*/

    Route::get('/Setting','UserController@SettingShow')->name('Setting');

    Route::post('/PassChange','UserController@PassChange');

	 /* Department View, Insert, Update, Delete */

    Route::get('/department/{data?}','DepartmentController@index')->name('department');

    Route::post('/departmentInsert','DepartmentController@store')->name('departmentStore');

    Route::post('/departmentUpdate/{data}','DepartmentController@update');

    Route::get('/departmentDelete','DepartmentController@delete');


    /* User Role View, Insert, Update, Delete */

    Route::get('/user_role/{data?}','UserroleController@index')->name('user_role');

    Route::post('/user_roleInsert','UserroleController@store')->name('user_roleStore');

    Route::post('/user_roleUpdate/{data}','UserroleController@update');

    Route::get('/user_roleDelete','UserroleController@delete');

    Route::get('/UserManagement','UserManagementController@index')->name('UserManagement');

    /* User Role Permission View, Insert, Delete */

    Route::post('/PermissionShow','UserManagementController@show');

    Route::get('/PermissionListShow','UserManagementController@listShow');

    Route::post('/PermissionDelete','UserManagementController@delete');

    Route::post('/PermissionStore','UserManagementController@store');

    Route::get('/softDelete','UserManagementController@softDelete')->name('softDelete');

    Route::get('restore/{id}','UserManagementController@reStore');

});