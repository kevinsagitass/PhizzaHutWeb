<?php

use Illuminate\Database\Seeder;

class AbilitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tr_user_ability')->insert([
            [
                'role_id' => 1,
                'task' => 'VIEW_ALL_USER'
            ],
            [
                'role_id' => 1,
                'task' => 'VIEW_ALL_USER_TRANSACTION'
            ],
            [
                'role_id' => 1,
                'task' => 'ADD_PIZZA'
            ],
            [
                'role_id' => 1,
                'task' => 'EDIT_PIZZA'
            ],
            [
                'role_id' => 1,
                'task' => 'DELETE_PIZZA'
            ],
            [
                'role_id' => 2,
                'task' => 'VIEW_CART'
            ],
            [
                'role_id' => 2,
                'task' => 'VIEW_TRANSACTION_HISTORY'
            ],
            [
                'role_id' => 2,
                'task' => 'ADD_PIZZA_TO_CART'
            ],
         ]);
    }
}
