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

Route::get('home','PageController@Home' );
Route::get('about','PageController@About');
Route::get('event','PageController@Event');
Route::get('rooms','PageController@Rooms');
Route::get('reservation/{idCate}','PageController@Reservation');
Route::post('postReservation','PageController@postReservation');
Route::get('exportBill','UserController@ExportBill');

//route cho login
Route::get('admin/login','UserController@getDangNhapAdmin');
Route::post('admin/dangnhappost','UserController@postDangNhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');

//tạo route cho trang admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

	Route::group(['prefix'=>'information'],function(){

		Route::get('list','InformationController@getInformation');

		Route::get('edit','InformationController@Edit');
		Route::post('editPost','InformationController@EditPost');
	
	}); //route for Information

	Route::group(['prefix'=>'about'],function(){

		Route::get('list','AboutController@getAbout');

		Route::get('edit','AboutController@Edit');
		Route::post('editPost','AboutController@EditPost');
	});	//Route for About

	Route::group(['prefix'=>'description'],function(){

		Route::get('list','DescriptionController@getDescription');

		Route::get('edit','DescriptionController@Edit');
		Route::post('editPost','DescriptionController@EditPost');
	});	//Route for About

	Route::group(['prefix'=>'event'],function(){

		Route::get('list','EventController@getEvent');

		Route::get('edit/{id}','EventController@Edit');
		Route::post('editPost/{id}','EventController@EditPost');

		Route::get('add','EventController@Add');
		Route::post('addpost','EventController@AddPost');

		

		Route::get('delete/{id}','EventController@Delete');
	});	//Route for Event

	Route::group(['prefix'=>'slide'],function(){

		Route::get('list','SlideController@getSlide');

		Route::get('edit/{id}','SlideController@Edit');
		Route::post('editPost/{id}','SlideController@EditPost');

		Route::get('add','SlideController@Add');
		Route::post('addpost','SlideController@AddPost');

		

		Route::get('delete/{id}','SlideController@Delete');
	});	//Route for slide

	Route::group(['prefix'=>'food'],function(){

		Route::get('list','FoodController@getFood');

		Route::get('edit/{id}','FoodController@Edit');
		Route::post('editPost/{id}','FoodController@EditPost');

		Route::get('add','FoodController@Add');
		Route::post('addpost','FoodController@AddPost');

		

		Route::get('delete/{id}','FoodController@Delete');
	});	//Route for delete

	Route::group(['prefix'=>'room'],function(){

		Route::get('list','RoomController@getRoom');

		Route::get('edit/{id}','RoomController@Edit');
		Route::post('editPost/{id}','RoomController@EditPost');

		Route::get('add','RoomController@Add');
		Route::post('addpost','RoomController@AddPost');

		

		Route::get('delete/{id}','RoomController@Delete');
	});	//Route for delete

	Route::group(['prefix'=>'reservation'],function(){

		Route::get('list','ReservationController@getReservation');

		Route::get('edit/{id}','ReservationController@Edit');
		Route::post('editPost/{id}','ReservationController@EditPost');

		Route::get('add','ReservationController@Add');
		Route::post('addpost','ReservationController@AddPost');

		

		Route::get('delete/{id}','ReservationController@Delete');
	});	//Route for delete

	Route::group(['prefix'=>'bill'],function(){

		Route::get('list/{id}','BillController@getBill');
		Route::get('add/{id}','BillController@add');
		Route::post('addpost/{id}','BillController@addPost');
		Route::get('export/{id}','BillController@Export');

		

		Route::get('delete/{id}/{idReser}','BillController@Delete');
	});	//Route for delete


});	


