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
            ['id' => '1', 'name' => 'Comando'],
            ['id' => '2', 'name' => 'Voluntario'],
            ['id' => '3', 'name' => 'Voluntario Interior']
        ];

        foreach ($statuses as $status) {

                Muserpol\AporteType::create($status);
            
        }
    }

}
