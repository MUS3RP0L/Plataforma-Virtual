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

        $this->createCategories();

        Eloquent::reguard();
    }

    private function createCategories()
    {
        $statuses = [
            ['id' => '1', 'from' => '0', 'to' => '4', 'name' => '0%', 'percentage' => '0'],
            ['id' => '2', 'from' => '5', 'to' => '8', 'name' => '35%', 'percentage' => '0.35'],
            ['id' => '3', 'from' => '9', 'to' => '12', 'name' => '45%', 'percentage' => '0.45'],
            ['id' => '4', 'from' => '13', 'to' => '16', 'name' => '55%', 'percentage' => '0.55'],
            ['id' => '5', 'from' => '17', 'to' => '20', 'name' => '65%', 'percentage' => '0.65'],
            ['id' => '6', 'from' => '21', 'to' => '24', 'name' => '75%', 'percentage' => '0.75'],
            ['id' => '7', 'from' => '25', 'to' => '28', 'name' => '85%', 'percentage' => '0.85'],
            ['id' => '8', 'from' => '29', 'to' => '0', 'name' => '100%', 'percentage' => '1'],

            ['id' => '9', 'from' => '0', 'to' => '0', 'name' => '', 'percentage' => '0.34'],
            ['id' => '10', 'from' => '0', 'to' => '0', 'name' => '', 'percentage' => '0.5']

        ];

        foreach ($statuses as $status) {

                Muserpol\Category::create($status);
            
        }
    }
}
