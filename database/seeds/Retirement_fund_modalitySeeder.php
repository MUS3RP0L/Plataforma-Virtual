<?php

use Illuminate\Database\Seeder;

class Retirement_fund_modalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createRetirement_fund_modalities();

        Eloquent::reguard();
    }

    private function createRetirement_fund_modalities()
    {
        $statuses = [
            ['id' => '1', 'shortened' => 'BAJA FORZOSA', 'name' => 'RETIRO POR BAJA FORZOSA'],
            ['id' => '2', 'shortened' => 'BAJA VOLUNTARIA', 'name' => 'RETIRO POR BAJA VOLUNTARIA'],
            ['id' => '3', 'shortened' => 'JUBILACIÓN', 'name' => 'RETIRO POR JUBILACIÓN'],
            ['id' => '4', 'shortened' => 'FALLECIMIENTO', 'name' => 'RETIRO POR FALLECIMIENTO'],
            ['id' => '5', 'shortened' => 'DEVOLUCIÓN', 'name' => 'DEVOLUCIÓN DE DESCUENTOS AL GARANTE']
        ];

        foreach ($statuses as $status) {
         
            Muserpol\Modality::create($status);
        }
    }
}
