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


//admin 
Route::get('/admin','AdminController@index');
Route::get('/trang-chu', 'AdminController@show_admin');
Route::get('/logout', 'AdminController@log_out');
Route::post('/admin-login', 'AdminController@dashboard');


//loai phòng
Route::get('/list-category', 'CategoryController@showCategory');
Route::post('/save-category', 'CategoryController@saveCategory');
Route::post('/update-category/{category_id}', 'CategoryController@updateCategory');
Route::get('/delete-category/{category_id}', 'CategoryController@deleteCategory');
Route::get('/edit-category/{category_id}', 'CategoryController@editCategory');

//loại user
Route::get('/list-kindroom', 'kindRoomController@showKindroom');
Route::post('/save-kindroom', 'kindRoomController@saveKindroom');
Route::post('/update-kindroom/{kindroom_id}', 'kindRoomController@updateKindroom');
Route::get('/delete-kindroom/{kindroom_id}', 'kindRoomController@deleteKindroom');
Route::get('/edit-kindroom/{kindroom_id}', 'kindRoomController@editKindroom');

//loại user
Route::get('/list-user', 'UserController@showUser');
Route::get('/add-user', 'UserController@addUser');
Route::post('/save-user', 'UserController@saveUser');
Route::get('/edit-user/{user_id}', 'UserController@editUser');
Route::post('/update-user/{user_id}', 'UserController@updateUser');
Route::get('/delete-user/{user_id}', 'UserController@deleteUser');

//vi Trí
Route::get('/list-local', 'localController@showLocal');
Route::post('/save-local', 'localController@saveLocal');
Route::post('/update-local/{local_id}', 'localController@updateLocal');
Route::get('/delete-local/{local_id}', 'localController@deleteLocal');
Route::get('/edit-local/{local_id}', 'localController@editLocal');

//POST
Route::get('/list-post', 'PostController@showPost');
