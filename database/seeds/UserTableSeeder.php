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
    	Muserpol\User::create([

            'ape' => 'Guisbert',
            'nom' => 'Erick',
        	'tel' => '77551112',
        	'username' => 'admin',
        	'password' => bcrypt('admin'),
        	'role' => 'admin'
        ]);
    }
}
