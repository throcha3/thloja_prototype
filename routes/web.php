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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/category',         'Painel\CategoryController')        ;
Route::resource('/customer',         'Painel\CustomerController')        ;
Route::resource('/order',            'Painel\OrderController')          ;
Route::resource('/orderitem',        'Painel\OrderItemController')       ;
Route::resource('/paymentcondition', 'Painel\PaymentConditionController');
Route::resource('/paymentmethod',    'Painel\PaymentMethodController')   ;
Route::resource('/product',          'Painel\ProductController')         ;
Route::resource('/subcategory',      'Painel\SubCategoryController')     ;

Auth::routes();
