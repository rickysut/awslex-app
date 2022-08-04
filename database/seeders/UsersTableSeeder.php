<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@aws.test',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'lex',
            'email' => 'bot@aws.test',
            'password' => bcrypt('password'),
        ]);

        
    }
}
