<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createCategoria();

        Eloquent::reguard();
    }

    private function createCategoria()
    {
        $statuses = [
            ['id' => '1', 'from' => '0', 'to' => '4', 'por' => '0'],
            ['id' => '2', 'from' => '5', 'to' => '8', 'por' => '0.35'],
            ['id' => '3', 'from' => '9', 'to' => '12', 'por' => '0.45'],
            ['id' => '4', 'from' => '13', 'to' => '16', 'por' => '0.55'],
            ['id' => '5', 'from' => '17', 'to' => '20', 'por' => '0.65'],
            ['id' => '6', 'from' => '21', 'to' => '24', 'por' => '0.75'],
            ['id' => '7', 'from' => '25', 'to' => '28', 'por' => '0.85'],
            ['id' => '8', 'from' => '29', 'to' => '0', 'por' => '1']

        ];

        foreach ($statuses as $status) {

                Muserpol\Categoria::create($status);
            
        }
    }
}