<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ms_roles')->insert([
            [
                'role_name' => 'Admin'
            ],
            [
                'role_name' => ''
            ],
         ]);
    }
}
