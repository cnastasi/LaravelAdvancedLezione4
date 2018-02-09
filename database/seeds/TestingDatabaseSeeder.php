<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                [
                    'name'     => 'Christian',
                    'email'    => 'christian@email.it',
                    'password' => bcrypt('password'),
                    'age'      => 18
                ],
                [
                    'name'     => 'Pippo',
                    'email'    => 'pippo@email.it',
                    'password' => bcrypt('password'),
                    'age'      => 34
                ]
            ]
        );
    }
}
