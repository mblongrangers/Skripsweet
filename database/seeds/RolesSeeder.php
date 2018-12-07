<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'label' => 'Admin'
        ]);

        Role::create([
        	'label' => 'Customer'
        ]);

        Role::create([
        	'label' => 'Direktur Operasional'
        ]);
    }
}
