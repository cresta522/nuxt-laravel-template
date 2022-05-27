<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'konagaya',
                'email' => 'cresta522@gmail.com',
                'password' => Hash::make('password')
            ],
        ];
        DB::table('users')->insert($data);
    }
}
