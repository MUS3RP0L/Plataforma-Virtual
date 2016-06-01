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
        	'username' => '4771553',
        	'password' => bcrypt('admin'),
        	'rol_id' => '1'
        ]);
    }
}
