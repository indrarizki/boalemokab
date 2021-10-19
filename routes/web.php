<?php

use Illuminate\Support\Facades\Auth;
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
   if (Auth::check()) {
        $user = Auth::user();
        $role = $user->role;
        $id = $user->id;
        if ($role == 'admin') {
            return redirect()->route('admin.ui');
        } elseif ($role == 'user') {
            return redirect()->route('user.ui');
        } 
    }
    return view('visitors.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'VisitorsController@welcome')->name('visitor.ui');

//ROUTE ADMIN
Route::get('/admin', 'Admin\AdminController@index')->name('admin.ui');

#ROUTE ADMIN INFORMATION
Route::get('/admin/information', 'Admin\InformationController@show')->name('admin.information.ui');
Route::get('/admin/information/form', 'Admin\InformationController@form')->name('admin.information.form.ui');
Route::post('admin/information/form', 'Admin\InformationController@form_create')->name('admin.information.form');
Route::delete('admin/information/{id}', 'Admin\InformationController@delete')->name('admin.information.delete');
Route::get('/admin/information/detail/{id}', 'Admin\InformationController@detail')->name('admin.information.detail.ui');
Route::get('/admin/information/edit/{id}', 'Admin\InformationController@edit')->name('admin.information.edit.ui');
Route::put('/admin/information/update/{id}', 'Admin\InformationController@update')->name('admin.information.update');

#ROUTE ADMIN PERMISSION
Route::get('/admin/permission', 'Admin\PermissionController@show')->name('admin.permission.ui');
Route::get('/admin/permission/form', 'Admin\PermissionController@form')->name('admin.permission.form.ui');
Route::post('admin/permission/form', 'Admin\PermissionController@form_create')->name('admin.permission.form');
Route::delete('/admin/permission/{id}', 'Admin\PermissionController@delete')->name('admin.permission.delete');
Route::get('/admin/permission/edit/{id}', 'Admin\PermissionController@edit')->name('admin.permission.edit.ui');
Route::put('/admin/permission/update_permission/{id}', 'Admin\PermissionController@update_permission')->name('admin.permission.update.permission');
