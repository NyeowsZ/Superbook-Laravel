<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Users;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Admin::create([
            'username' => 'admin',
            'firstname' => 'Adminstrator',
            'lastname' => '',
            'middlename' => '',
            'password' => bcrypt('password')
        ]);
    }
}
