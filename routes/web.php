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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Category Routee
Route::get('add/category', 'CategoryController@addcategory');
Route::post('add/category/post', 'CategoryController@addcategorypost');
Route::get('add/category/update/{category_id}', 'CategoryController@addcategoryupdate');
Route::post('add/category/update/post', 'CategoryController@addcategoryupdatepost');
Route::get('category/delete/{category_id}', 'CategoryController@categorydelete');
Route::get('category/restore/{category_id}', 'CategoryController@categoryrestore');
Route::get('category/forcedeletes/{category_id}', 'CategoryController@categoryforcedeletes');
// Profile Routee
Route::get('profile/edit', 'ProfileController@profileedit');
Route::post('profile/post', 'ProfileController@profilepost');
Route::post('password/post', 'ProfileController@passwordpost');
// For Practice
Route::get('practice', 'PracticeController@practice');
// CRUD Opation
Route::get('add/crudusers', 'CrudusersController@addcrudusers');
Route::get('crud/users/form', 'CrudusersController@crudusersform');
Route::post('user/post', 'CrudusersController@userpost');
Route::get('user/update/{crudoperation_id}', 'CrudusersController@userupdate');
Route::post('user/update/post', 'CrudusersController@userupdatepost');
Route::get('user/view/{crudoperation_id}', 'CrudusersController@userview');
Route::get('user/delete/{crudoperation_id}', 'CrudusersController@userdelete');
