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

// Route::get('/', function () {
//     return view('welcome');

Route::get('/','FrontendController@index')->name('indexpage');
Route::get('frontendlogin','FrontendController@frontendlogin')->name('frontendloginpage');
Route::get('shoppingcart','FrontendController@shoppingcart')->name('shoppingcartpage');
Route::get('frontendregister','FrontendController@frontendregister')->name('frontendregisterpage');
Route::get('orderhistory','FrontendController@orderhistory')->name('orderhistorypage');
Route::get('promotion','FrontendController@promotion')->name('promotionpage');
Route::get('frontendbrand','FrontendController@frontendbrand')->name('frontendbrandpage');
Route::get('categoriesitem/{id}','FrontendController@categoriesitem')->name('categoriesitempage');
Route::resource('orders','OrderController');




Route::middleware('role:admin')->group(function(){
Route::get('dashboard','BackendController@dashboard')->name('dashboardpage');
Route::resource('categories', 'CategoryController');
Route::resource('brands','BrandController');
Route::resource('subcategories','SubcategoryController');
Route::resource('items','ItemController');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
