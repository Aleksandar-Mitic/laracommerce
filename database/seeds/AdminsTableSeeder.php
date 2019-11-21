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
                'name' => 'Prof. Zoie Ryan DDS',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$Q2cw54r3Sqwg00DUFfKkoewKogY034pGEy9ehZtRXRB9F6NZkKeza',
                'is_super' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-11-21 08:12:31',
                'updated_at' => '2019-11-21 08:12:31',
            ),
        ));
        
        
    }
}