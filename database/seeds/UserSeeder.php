<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'admin',
                'password' => bcrypt('secret')
            ]
        ];
        try {
            \App\User::insert($user);
        } catch (\Exception $exception){}
    }
}
