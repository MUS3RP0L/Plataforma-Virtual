<?php

use Illuminate\Database\Seeder;

class ContributionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createContribution_types();

        Eloquent::reguard();
    }

    private function createContribution_types()
    {
        $statuses = [
            ['id' => '1', 'name' => 'COMANDO'],
            ['id' => '2', 'name' => 'VOLUNTARIO'],
            ['id' => '3', 'name' => 'VOLUNTARIO INTERIOR']
        ];

        foreach ($statuses as $status) {

                Muserpol\ContributionType::create($status);
            
        }
    }

}
