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

Route::post('file/orders', 'OrdersController@storeFileOrder')->name('orders.store_file_order');

//支付宝路由
Route::get('payment/{order}/alipay', 'PaymentController@payByAlipay')->name('payment.alipay');
//支付宝前端回调
Route::get('payment/alipay/return', 'PaymentController@alipayReturn')->name('payment.alipay.return');
//支付宝服务端回调，注意不能放在auth中间件组中，因为不带认证信息
Route::post('payment/alipay/notify', 'PaymentController@alipayNotify')->name('payment.alipay.notify');

//微信路由
Route::get('payment/{order}/wechat', 'PaymentController@payByWechat')->name('payment.wechat');
//服务端回调，注意不要放在auth组中
Route::post('payment/wechat/notify', 'PaymentController@wechatNotify')->name('payment.wechat.notify');

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

