<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		User::where('email', 'jobboard@example.com')->delete();

		$user               = new User();
		$user->firstname    = 'Job';
		$user->lastname     = 'Board';
		$user->email        = 'jobboard@example.com';
		$user->email_token  = base64_encode('jobboard@example.com');
		$user->password     = Hash::make('jobBoardHetic');
		$user->promo        = '2020';
		$user->is_confirmed = 1;
		$user->save();
	}
}
