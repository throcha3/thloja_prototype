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
//Home page
Route::get('/', 'HomeController@index')->name('home');

//Rotas principais das entidades
Route::resource('/category',         'Painel\CategoryController'        );
Route::resource('/customer',         'Painel\CustomerController'        );
Route::resource('/order',            'Painel\OrderController'           );
Route::resource('/orderitem',        'Painel\OrderItemController'       );
Route::resource('/paymentcondition', 'Painel\PaymentConditionController');
Route::resource('/paymentmethod',    'Painel\PaymentMethodController'   );
Route::resource('/product',          'Painel\ProductController'         );
Route::resource('/subcategory',      'Painel\SubCategoryController'     );
Route::resource('/bill',             'Painel\BillController'            );

//Rotas adicionais das entidades
Route::get ('/category/{catId}/sub_create',  'Painel\CategoryController@subCreate')->name('category.sub_create');
Route::post('/category/sub_store',           'Painel\CategoryController@subStore') ->name('category.sub_store' );

Route::get ('/order/{ordId}/item_create',    'Painel\OrderController@itemCreate')   ->name('order.item_create'  );
Route::post('/order/item_store',             'Painel\OrderController@itemStore')    ->name('order.item_store'   );

//Auth
Auth::routes();