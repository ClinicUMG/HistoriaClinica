<?php

use Illuminate\Support\Facades\Route;

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

//rutas

Route::get('/', function(){
    return view('Welcome');
});

Route::get('home', function(){
  return view('home');
})->middleware('auth');

Auth::routes(['verify' => true]);
//Backoffice
Route:: group(['middleware'=>['auth'], 'as'=>'backoffice.'],function(){
    //Route::get('role', 'RoleController@index')->name('role.index');
    Route::resource('user', 'UserController');
    Route::get('user/{user}/assign_role', 'UserController@assign_role')->name('user.assign_role');
    Route::post('user/{user}/role_assignment', 'UserController@role_assignment')->name('user.role_assignment');
    Route::get('user/{user}/assign_permission', 'UserController@assign_permission')->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment', 'UserController@permission_assignment')->name('user.permission_assignment');
    Route::resource('role', 'RoleController'); 
    Route::resource('permission', 'PermissionController');
});

//Route::get('demo',function () {
  //  return view('theme.backoffice.pages.demo');
//});


//Route::get('/home', 'HomeController@index')->name('home');
