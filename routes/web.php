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

Route::get('shape', function()
{
 $shape = new MyShapes;
 return $shape->octagon();
});

Route::get('shape/triangle', function()
{
 $shape = new Custom\Shapes\MyShapes;
 return $shape->triangle();
});

Route::get('userform', function(){
	return View::make('userform');
});

Route::post('userform', function(){
	$rules = array('email' => 'required|email|different:username',
					'username' => 'required|min:6',
					'password' => 'required|min:6|same:password_confirm',
					'no_email' => 'honey_pot');

	$messages = array('min' => 'kuran panjang bro !',
						'username.required' => 'username harus diisi',
						'honey_pot' => 'Nothing should be in this field');

	$validation = Validator::make(Input::all(), $rules, $messages);
	if ($validation->fails()) {
		return Redirect::to('userform') -> withErrors($validation) -> withInput();
	}

	return Redirect::to('userresults') -> withInput();
});

Validator::extend('honey_pot', function($attribute, $value, $parameters){
	return $value == '';
});
	
Route::get('userresults', function() {
    return dd(Input::old());
});
