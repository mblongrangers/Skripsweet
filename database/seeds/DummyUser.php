<?php

use Illuminate\Database\Seeder;
use App\User;

class DummyUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->email = 'admin@example.com';
        $user->password = bcrypt('password');
        $user->role_id = 1;
        $user->save();

        $user = new User;
        $user->email = 'dirop@example.com';
        $user->password = bcrypt('password');
        $user->role_id = 3;
        $user->save();
    }
}
