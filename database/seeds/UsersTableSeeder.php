<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'username' => 'Peihui Shao',
            'email' => 'shaopeihui1@gmail.com',
            'password' => Hash::make('dianhua')
        ]);
    }

}