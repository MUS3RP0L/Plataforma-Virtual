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

            ['name' => 'BENI', 'shortened' => 'BN'],
            ['name' => 'CHUQUISACA', 'shortened' => 'CH'],
            ['name' => 'COCHABAMBA', 'shortened' => 'CB'],
            ['name' => 'LA PAZ', 'shortened' => 'LP'],
            ['name' => 'ORURO', 'shortened' => 'OR'],
            ['name' => 'PANDO', 'shortened' => 'PN'],
            ['name' => 'POTOSÍ', 'shortened' => 'PO'],
            ['name' => 'SANTA CRUZ', 'shortened' => 'SC'],
            ['name' => 'TARIJA', 'shortened' => 'TJ']

        ];

        foreach ($statuses as $status) {

            Muserpol\City::create($status);
            
        }
    }
}