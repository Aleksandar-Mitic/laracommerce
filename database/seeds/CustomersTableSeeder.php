<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Alex',
                'email' => 'admin@admin.com',
                'password' => '$2y$12$Ss4UVy0jlbv27yC03/aLWuaRpsQMgmZ9tO5RtSwCY0lYnujj56iJG',
                'email_verified_at' => '2019-01-01 12:00:00',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}