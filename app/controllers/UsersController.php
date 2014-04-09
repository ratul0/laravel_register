<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */

	function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
   		
	}
	public function index()
	{
		$users = User::all();

		return View::make('users.index', compact('users'))->with('title',"Show All");
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create')->with('title',"Register");
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		/**/

		$validation = User::validate($data = Input::all());

		if($validation->passes()){

			$user = ['email'=>Input::get('email'),'username'=>Input::get('username'),'password'=>Hash::make(Input::get('password'))];


			User::create($user);

			return Redirect::route('login')->with('message','Admin Account Created!');
			
		}

		return Redirect::back()->withInput()->withErrors($validation);
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::user()->id== $id ){
			$user = User::find($id);

			return View::make('users.edit', compact('user'))->with('title',"Register");
		}else{
			return Redirect::route('home');
		}
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$validation = User::validate($data = Input::all());

		if($validation->passes()){

			$user = ['email'=>Input::get('email'),'username'=>Input::get('username'),'password'=>Hash::make(Input::get('password'))];

			//User::update($user);
			User::find($id)->update($user);

			return Redirect::route('login')->with('message','Admin Account Updated!');
			
		}

		return Redirect::back()->withInput()->withErrors($validation);
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		User::destroy($id);
		return Redirect::route('user.index')
				->with('message','User Deleted!');
	}

	public function getLogin(){
		return View::make('users/login')->with('title',"M M");
	}
	public function postLogin(){
		$user = ['email'=>Input::get('email'),'password'=>Input::get("password")];


		if(Auth::attempt($user)){
			return Redirect::route('home')->with('message','You are Logged In !!');

		}else{
			return Redirect::back()->with('message','your username/password was invalid')->withInput();
		}
	}

	public function getLogout()
	{
		if(Auth::check()){
			Auth::logout();
			return Redirect::route('login')->with('message','You are now logged out!');
		}else{
			return Redirect::route('home');
		}
	}

	public function home(){
		return View::make('users.home')->with('title',"Home");
	}

}