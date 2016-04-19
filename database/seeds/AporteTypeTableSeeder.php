<?php

use Illuminate\Database\Seeder;

class AporteTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createAporteType();

        Eloquent::reguard();
    }

    private function createAporteType()
    {
        $statuses = [
            ['id' => '1', 'name' => 'COMANDO'],
            ['id' => '2', 'name' => 'VOLUNTARIO'],
            ['id' => '3', 'name' => 'VOLUNTARIO INTERIOR']
        ];

        foreach ($statuses as $status) {

                Muserpol\AporteType::create($status);
            
        }
    }

}
