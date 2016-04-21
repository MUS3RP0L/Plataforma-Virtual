<?php

use Illuminate\Database\Seeder;

class SoliTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createSoliType();

        Eloquent::reguard();
    }

    private function createSoliType()
    {
        $statuses = [
            ['id' => '1', 'name' => 'TITULAR'],
            ['id' => '2', 'name' => 'CONYUGE'],
            ['id' => '3', 'name' => 'OTRO']
        ];

        foreach ($statuses as $status) {

                Muserpol\SoliType::create($status);
            
        }
    }
}
