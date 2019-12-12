<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aleksandar Mitic',
                'email' => 'ravickalex@gmail.com',
                'password' => '$2y$12$Ss4UVy0jlbv27yC03/aLWuaRpsQMgmZ9tO5RtSwCY0lYnujj56iJG',
                'is_super' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-11-21 08:12:31',
                'updated_at' => '2019-11-21 08:12:31',
            ),
        ));
        
        
    }
}