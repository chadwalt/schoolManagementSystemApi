<?php
/**
 * This is a database seeder for the users table.
 * It will populate the table is the seeder command is run.
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * UsersTableSeeder - Populates the users table.
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the seeder
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                "first_name" => "Kyadondo",
                "last_name" => "Timothy",
                "username" => "chadwalt",
                "password" => Hash::make("1234"),
                "email" => "chadwalt@outlook.com",
                "role" => "admin",
                "profile_pic" => "",
            ]
        );
    }
}
