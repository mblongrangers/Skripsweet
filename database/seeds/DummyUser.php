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
        $user->email = 'admin@ams.com';
        $user->password = bcrypt('123456789');
        $user->role_id = 1;
        $user->save();
    
        $user = new User;
        $user->email = 'dirop@ams.com';
        $user->password = bcrypt('12345678');
        $user->role_id = 3;
        $user->save();

        $user = new User;
        $user->email = 'akuntan@ams.com';
        $user->password = bcrypt('123456');
        $user->role_id = 4;
        $user->save();
    }
}
