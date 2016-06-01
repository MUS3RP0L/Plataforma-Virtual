<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createRoles();

        Eloquent::reguard();
    }

    private function createRoles()
    {
        $statuses = [
            ['id' => '1', 'name' => 'Administrador'],
            ['id' => '2', 'name' => 'Fondo de Retiro'],
            ['id' => '3', 'name' => 'Fondo de Retiro - Ventanilla'],
            ['id' => '4', 'name' => 'Fondo de Retiro - Certificación'],
            ['id' => '5', 'name' => 'Fondo de Retiro - Calificación'],
            ['id' => '6', 'name' => 'Fondo de Retiro - Legal'],      
            ['id' => '7', 'name' => 'Complemento Económico'],

        ];

        foreach ($statuses as $status) {
         
            Muserpol\Rol::create($status);
            
        }
    }
}
