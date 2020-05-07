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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [
	'uses'=>'IndexController@index',
	'as'=>'index'
]);

Route::post('/login', [
	'uses'=>'HeaderController@login',
	'as'=>'login'
]);

Route::get('/logout', [
	'uses'=>'HeaderController@logout',
	'as'=>'logout'
]);

Route::post('/register', [
	'uses'=>'HeaderController@register',
	'as'=>'register'
]);

// Danh sach post thanh pho
// 
// 
Route::get('/index/search/city/{type}', [
	'uses'=>'CityController@citylist',
	'as'=>'citylists'
]);

// Danh sach loai cho nghi
// 
// 
Route::get('/index/search/accomm/{type}', [
	'uses'=>'AccommController@accommlist',
	'as'=>'accommlists'
]);

//Chi tiet cho nghi
//
//
Route::get('/index/detail/{type}', [
	'uses'=>'DetailController@detail',
	'as'=>'detail'
]);

Route::get('/index/booking/{type}',[
	'uses'=>'BookingController@getBooking',
	'as'=>'book-room'
]);

Route::post('/index/booking/process',[
	'uses'=>'BookingController@insertBooking',
	'as'=>'booking-process'
]);

Route::get('index/confirm',[
	'uses'=>'BookingController@confirmBooking',
	'as'=>'booking-confirm'
]);

// User
Route::get('/profile', [
	'uses'=>'UserController@getProfile',
	'as'=>'profile'
])->middleware('checkLogin');

Route::post('/profile/update-info', [
	'uses'=>'UserController@updateInfo',
	'as'=>'update_info'
])->middleware('checkLogin');

Route::get('/profile/password', [
	'uses'=>'UserController@password',
	'as'=>'password'
])->middleware('checkLogin');

Route::post('/profile/password/process', [
	'uses'=>'UserController@updatePassword',
	'as'=>'update-password'
])->middleware('checkLogin');

Route::get('/profile/post', [
	'uses'=>'UserController@post',
	'as'=>'post'
])->middleware('checkLogin');

Route::get('/profile/booking', [
	'uses'=>'UserController@booking',
	'as'=>'booking'
])->middleware('checkLogin');

Route::get('/profile/booking/delete/{id}', [
	'uses'=>'UserController@cancelTransaction',
	'as'=>'booking-delete'
])->middleware('checkLogin');

Route::get('/profile/booking/edit/{id}', [
	'uses'=>'UserController@getEditBooking',
	'as'=>'booking-edit'
])->middleware('checkLogin');

Route::post('/profile/booking/process', [
	'uses'=>'UserController@getEditBookingProcess',
	'as'=>'booking-edit-process'
])->middleware('checkLogin');

Route::get('/profile/booking/confirm', [
	'uses'=>'UserController@confirmEditBooking',
	'as'=>'booking-edit-confirm'
])->middleware('checkLogin');

Route::get('/profile/post/delete/{id}', [
	'uses'=>'UserController@updateDeletePost',
	'as'=>'delete-post'
])->middleware('checkLogin');

Route::get('/profile/posting', [
	'uses'=>'UserController@posting',
	'as'=>'posting'
])->middleware('checkLogin');

Route::post('/profile/posting/process', [
	'uses'=>'UserController@postProcess',
	'as'=>'post-process'
])->middleware('checkLogin');

Route::get('/profile/post/edit/{id}', [
	'uses'=>'UserController@postEdit',
	'as'=>'post-edit'
])->middleware('checkLogin');

Route::get('/profile/post/tran/{id}', [
	'uses'=>'UserController@postTran',
	'as'=>'post-tran'
])->middleware('checkLogin');

Route::get('/profile/post/receipt/{id}', [
	'uses'=>'UserController@getReceipt',
	'as'=>'post-receipt'
])->middleware('checkLogin');

Route::get('/profile/post/receipt_print/{id}', [
	'uses'=>'UserController@receiptPrint',
	'as'=>'post-print'
])->middleware('checkLogin');

//end user

// Admin
Route::prefix('admin')->middleware(['checkAdmin'])->group(function(){
	Route::prefix('user')->group(function(){
		// Get list 
		Route::get('list', [
			'uses'=>'AdminUserController@getList',
			'as'=>'admin-user-list'
		]);
		// Show add
		Route::get('add', [
			'uses'=>'AdminUserController@getAdd',
			'as'=>'admin-user-add'
		]);
		// Add process
		Route::post('addprocess', [
			'uses'=>'AdminUserController@postAdd',
			'as'=>'admin-user-add-process'
		]);
		// Delete process
		Route::get('delete/{id}', [
			'uses'=>'AdminUserController@getDelete',
			'as'=>'admin-user-delete'
		]);
		// Show edit
		Route::get('edit/{id}', [
			'uses'=>'AdminUserController@getEdit',
			'as'=>'admin-user-edit'
		]);
		// Edit process
		Route::post('editprocess', [
			'uses'=>'AdminUserController@postEdit',
			'as'=>'admin-user-edit-process'
		]);
	});
	Route::prefix('city')->group(function(){
		// Get list 
		Route::get('list', [
			'uses'=>'AdminCityController@getList',
			'as'=>'admin-city-list'
		]);
		// Show add
		Route::get('add', [
			'uses'=>'AdminCityController@getAdd',
			'as'=>'admin-city-add'
		]);
		// Add process
		Route::post('addprocess', [
			'uses'=>'AdminCityController@postAdd',
			'as'=>'admin-city-add-process'
		]);
		// Delete process
		Route::get('delete/{id}', [
			'uses'=>'AdminCityController@getDelete',
			'as'=>'admin-city-delete'
		]);
		// Show edit
		Route::get('edit/{id}', [
			'uses'=>'AdminCityController@getEdit',
			'as'=>'admin-city-edit'
		]);
		// Edit process
		Route::post('editprocess', [
			'uses'=>'AdminCityController@postEdit',
			'as'=>'admin-city-edit-process'
		]);
	});
	Route::prefix('feedback')->group(function(){
		// Get list 
		Route::get('list', [
			'uses'=>'AdminFeedbackController@getList',
			'as'=>'admin-feedback-list'
		]);
	});
	Route::prefix('roomtype')->group(function(){
		// Get list 
		Route::get('list', [
			'uses'=>'AdminRoomTypeController@getList',
			'as'=>'admin-roomtype-list'
		]);
		// Show add
		Route::get('add', [
			'uses'=>'AdminRoomTypeController@getAdd',
			'as'=>'admin-roomtype-add'
		]);
		// Add process
		Route::post('addprocess', [
			'uses'=>'AdminRoomTypeController@postAdd',
			'as'=>'admin-roomtype-add-process'
		]);
		// Delete process
		Route::get('delete/{id}', [
			'uses'=>'AdminRoomTypeController@getDelete',
			'as'=>'admin-roomtype-delete'
		]);
		// Show edit
		Route::get('edit/{id}', [
			'uses'=>'AdminRoomTypeController@getEdit',
			'as'=>'admin-roomtype-edit'
		]);
		// Edit process
		Route::post('editprocess', [
			'uses'=>'AdminRoomTypeController@postEdit',
			'as'=>'admin-roomtype-edit-process'
		]);
	});
	Route::prefix('post')->group(function(){
		// Get list
		Route::get('list', [
			'uses'=>'AdminPostController@getList',
			'as'=>'admin-post-list'
		]);
		// Delete 
		Route::get('delete/{id}', [
			'uses'=>'AdminPostController@getDelete',
			'as'=>'admin-post-delete'
		]);
		// Review
		Route::get('review/{id}', [
			'uses'=>'AdminPostController@getReview',
			'as'=>'admin-post-review'
		]);
	});
	Route::prefix('accommodationtype')->group(function(){
		// Get list 
		Route::get('list', [
			'uses'=>'AdminAccommodationTypeController@getList',
			'as'=>'admin-accommodationtype-list'
		]);
		// Show add
		Route::get('add', [
			'uses'=>'AdminAccommodationTypeController@getAdd',
			'as'=>'admin-accommodationtype-add'
		]);
		// Add process
		Route::post('addprocess', [
			'uses'=>'AdminAccommodationTypeController@postAdd',
			'as'=>'admin-accommodationtype-add-process'
		]);
		// Delete process
		Route::get('delete/{id}', [
			'uses'=>'AdminAccommodationTypeController@getDelete',
			'as'=>'admin-accommodationtype-delete'
		]);
		// Show edit
		Route::get('edit/{id}', [
			'uses'=>'AdminAccommodationTypeController@getEdit',
			'as'=>'admin-accommodationtype-edit'
		]);
		// Edit process
		Route::post('editprocess', [
			'uses'=>'AdminAccommodationTypeController@postEdit',
			'as'=>'admin-accommodationtype-edit-process'
		]);
	});
	Route::prefix('service')->group(function(){
		// Get list 
		Route::get('list', [
			'uses'=>'AdminServiceController@getList',
			'as'=>'admin-service-list'
		]);
		// Show add
		Route::get('add', [
			'uses'=>'AdminServiceController@getAdd',
			'as'=>'admin-service-add'
		]);
		// Add process
		Route::post('addprocess', [
			'uses'=>'AdminServiceController@postAdd',
			'as'=>'admin-service-add-process'
		]);
		// Delete process
		Route::get('delete/{id}', [
			'uses'=>'AdminServiceController@getDelete',
			'as'=>'admin-service-delete'
		]);
		// Show edit
		Route::get('edit/{id}', [
			'uses'=>'AdminServiceController@getEdit',
			'as'=>'admin-service-edit'
		]);
		// Edit process
		Route::post('editprocess', [
			'uses'=>'AdminServiceController@postEdit',
			'as'=>'admin-service-edit-process'
		]);
	});
});