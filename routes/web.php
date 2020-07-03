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

// frontend toutes
	// home page

	Route::get("/",'Home\IndexController@index');

	// category page

	Route::get('/types/{id}','Home\TypesController@index');


	// product imformation
	Route::get('/goods/{id}','Home\GoodsController@index');

	// login page

	Route::get('/login','Home\LoginController@index');

	// register page
	Route::get('/reg','Home\RegController@index');

	//  process registration

	Route::post('/regCheck',"Home\RegController@check");

	// captcha
	Route::get('/yzm','Home\RegController@yzm');

	// activate url
	Route::get("activate/{id}/{token}","Home\RegController@activate");

	// process login
	Route::post("/check","Home\LoginController@check");

	// logout
	Route::get('/logout','Home\LoginController@logout');

	// recover password
	Route::any("/recover","Home\LoginController@recover");

	// edit password
	Route::any("savePass/{id}/{token}","Home\LoginController@savePass");

	// cart page
	Route::get("cart","Home\CartController@index");

	// add to cart
	Route::get("addCart","Home\CartController@addCart");








// backend

	// login page
	Route::get('admin/login','Admin\LoginController@index');
	// captcha
	Route::get('admin/yzm','Admin\LoginController@yzm');
	// process login
	Route::post('admin/check','Admin\LoginController@check');

	// logout
	Route::get("admin/logout",'Admin\LoginController@logout');
	// file upload
	Route::any("/admin/shangchuan","Admin\CommonController@upload");

	// clear cache
	Route::get("/admin/flush","Admin\IndexController@flush");

	Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'adminLogin'],function(){
		// index
		Route::get('/','IndexController@index');

		// administrator management
		Route::resource('admin','AdminController');
		// administrator status
		Route::post('admin/ajaxStatu','AdminController@ajaxStatu');

		// user management
		Route::get('user','UserController@index');

		// product management
		Route::resource('goods','GoodsController');

		// order management
		Route::get('orders',"OrdersController@index");

			// view order information
			Route::get("orders/list","OrdersController@lists");
			// view order address
			Route::get("orders/addr","OrdersController@addr");

			// edit order status
			Route::any("orders/edit","OrdersController@edit");
			// order status
			Route::get("orders/statu","OrdersController@statuList");
			Route::post("orders/statu/edit","OrdersController@statuEdit");
		// comment management
			Route::get('comment',"CommentController@index");
			Route::post('comment/ajaxStatu',"CommentController@ajaxStatu");

		// types management
		Route::resource('types','TypesController');

		// system management

			// sys management
			Route::resource("sys/config","ConfigsController");
			// slider management
			Route::resource("sys/slider","SliderController");

			// ads management
			Route::resource("sys/ads","AdsController");

			// typesAds management
			Route::resource("sys/types","TypesAdsController");

		// cache
			Route::get("cache","CacheController@index");

	});
