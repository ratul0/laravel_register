<?php


Route::get('/','UsersController@getLogin');

Route::get('login',['as'=>'login','uses'=>'UsersController@getLogin']);
Route::post('login',['as'=>'login','uses'=>'UsersController@postLogin']);

Route::get('home',['as'=>'home','uses'=>'UsersController@index']);


Route::get('user/create',['as'=>'register','uses'=>'UsersController@create']);
Route::post('user/create',['as'=>'register','uses'=>'UsersController@store']);
/**/

Route::group(array('before' => 'auth'), function()
{

	Route::get('user/delete/{id}', 'UsersController@destroy');


	Route::get('user/{id}/create',['as'=>'user.edit','uses'=>'UsersController@edit']);
	Route::put('user/{id}',['as'=>'user.update','uses'=>'UsersController@update']);
	Route::get('users',['as'=>'user.index','uses'=>'UsersController@index']);
	Route::get('home',['as'=>'home','uses'=>'UsersController@home']);
	Route::get('logout',['as'=>'logout', 'uses'=>'UsersController@getLogout']);

	Route::resource('member','MembersController');


});
