<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name'     => 'ludmila',
            'email'    => 'ludmila.macukane@gmail.com',
            'password' => bcrypt('secret'),
            'role_id'  => 1
        ]);
        User::create([
            'name'     => 'johnny',
            'email'    => 'john.doe@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
