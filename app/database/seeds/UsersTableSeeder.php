<?php



class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = ['username'=>'ratul','email'=>'ratulcse27@gmail.com','password'=>Hash::make('1')];
		User::create($user);

	}

}