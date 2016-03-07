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
            ['id' => '1', 'por' => '0'],
            ['id' => '2', 'por' => '35'],
            ['id' => '3', 'por' => '45'],
            ['id' => '4', 'por' => '55'],
            ['id' => '5', 'por' => '65'],
            ['id' => '6', 'por' => '75'],
            ['id' => '7', 'por' => '85'],
            ['id' => '8', 'por' => '100']

        ];

        foreach ($statuses as $status) {

                Muserpol\Categoria::create($status);
            
        }
    }
}
