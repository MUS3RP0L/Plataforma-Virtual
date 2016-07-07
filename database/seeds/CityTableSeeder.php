<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createCities();

        Eloquent::reguard();
    }

    private function createCities()
    {
        $statuses = [

            ['name' => 'BENI', 'code' => 'BN'],
            ['name' => 'CHUQUISACA', 'code' => 'CH'],
            ['name' => 'COCHABAMBA', 'code' => 'CB'],
            ['name' => 'LA PAZ', 'code' => 'LP'],
            ['name' => 'ORURO', 'code' => 'OR'],
            ['name' => 'PANDO', 'code' => 'PN'],
            ['name' => 'POTOSÍ', 'code' => 'PO'],
            ['name' => 'SANTA CRUZ', 'code' => 'SC'],
            ['name' => 'TARIJA', 'code' => 'TJ']

        ];

        foreach ($statuses as $status) {

            Muserpol\City::create($status);
            
        }
    }
}