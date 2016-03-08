<?php

use Illuminate\Database\Seeder;

class PagoTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createPagoType();

        Eloquent::reguard();
    }

    private function createPagoType()
    {
        $statuses = [
            ['id' => '1', 'name' => 'Cheque'],
            ['id' => '2', 'name' => 'Contabilidad'],
            ['id' => '2', 'name' => 'Efectivo'],
            ['id' => '2', 'name' => 'Efectivo Deposito'],
            ['id' => '2', 'name' => 'Deposito en Cuenta']
        ];

        foreach ($statuses as $status) {

                Muserpol\PagoType::create($status);
            
        }
    }
}
