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

Route::get('fileform', function(){
	return View::make('fileform');
});

Route::post('fileform', function(){
	$rules = array('myfile' => 'mimes:doc,docx,pdf,xlsx|max:1000');
	$validation = Validator::make(Input::all(), $rules);
	if ($validation -> fails()) {
		return Redirect::to('fileform') -> withErrors($validation) -> withInput();
	}
	else{
		$file = Input::file('myfile');
		if ($file->move('files',$file -> getClientOriginalName())) {
			return 'Success';
		}
		else{
			return 'Error';
		}
	}
});

Route::get('redactor', function() {
  return View::make('redactor');
});

Route::post('redactorupload', function(){
	$rules = array('file' => 'image|max:10000');
	$validation = Validator::make(Input::all(), $rules);
	$file = Input::file('file');
	if($validation->fails()){
		return FALSE;
	}
	else{
		if ($file->move('files', $file->getClientOriginalName())) {
			return Response::json(array('filelink' => 'files/'.$file->getClientOriginalName()));
		}
		else{
			return FALSE;
		}
	}
});

Route::post('redactor', function(){
	return dd(Input::all());
});