<?php

use Illuminate\Database\Seeder;

class ApplicantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createApplicant_types();

        Eloquent::reguard();
    }

    private function createApplicant_types()
    {
        $statuses = [
            ['id' => '1', 'name' => 'TITULAR'],
            ['id' => '2', 'name' => 'CONYUGE'],
            ['id' => '3', 'name' => 'OTRO']
        ];

        foreach ($statuses as $status) {

                Muserpol\ApplicantType::create($status);
            
        }
    }
}
