<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
		Model::unguard();
			User::create([
			'name' => 'admin',
			'email' => 'admin@admin.com',
			'password' => bcrypt('password'),
 'remember_token' => str_random(50),

		]);
    }
}
