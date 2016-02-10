<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();

    	Eloquent::unguard();

        $this->createAdmin();

        Eloquent::reguard();

    }

    private function createAdmin()
    {
    	App\User::create([

        	'name' => 'Erick Guis',
        	'email' => 'aleguis@icloud.com',
        	'password' => bcrypt('123123'),
        	'role' => 'admin',
        ]);
    }
}
