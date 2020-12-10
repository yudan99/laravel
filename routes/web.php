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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//    return view('vue');
//});
Route::get('/', 'PagesController@root')->name('root');  //->middleware('verified')

Auth::routes(['verify'=> true]); //['verify' => true]

Route::post('orders', 'OrdersController@store')->name('orders.store');

Route::resource('users', 'UsersController');    //, ['only' => ['show', 'update', 'edit']]

//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('orders', 'OrdersController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('order_items', 'OrderItemsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('file_shares', 'FileSharesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('fiels', 'FielsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('courses', 'CoursesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('sections', 'SectionsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::get('alipay', function() {
    return app('alipay')->web([
        'out_trade_no' => time(),
        'total_amount' => '0.01',
        'subject' => 'test subject - 测试',
    ]);
});

