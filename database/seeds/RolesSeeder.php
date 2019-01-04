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
        	'name' => 'Admin'
        ]);

        Role::create([
        	'name' => 'Customer'
        ]);

        Role::create([
        	'name' => 'Direktur Operasional'
        ]);
    }
}
