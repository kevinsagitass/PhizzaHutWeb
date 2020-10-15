<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ms_user')->insert([
            [
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'pass' => Hash::make('admin1'),
                'confirm_pass' => 'admin1',
                'address' => 'admin1 Address',
                'phone_number' => '08128871927',
                'gender' => 'Male',
                'role_id' => 1
            ]
         ]);
    }
}
