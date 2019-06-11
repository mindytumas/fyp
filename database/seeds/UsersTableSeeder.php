<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'username' => 'superadmin',
            'password'  => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => './images/avatar2.png',
            'about' => 'whatever'
        ]);
    }

}
