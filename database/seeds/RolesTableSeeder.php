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
            ['name' => 'Administrador'],
            ['name' => 'Fondo de Retiro'],
            ['name' => 'Fondo de Retiro - Ventanilla'],
            ['name' => 'Fondo de Retiro - Certificación'],
            ['name' => 'Fondo de Retiro - Calificación'],
            ['name' => 'Fondo de Retiro - Legal'],      
            ['name' => 'Complemento Económico']

        ];

        foreach ($statuses as $status) {
         
            Muserpol\Role::create($status);
            
        }
    }
}
