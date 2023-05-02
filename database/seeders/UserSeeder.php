<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Employee',
                'email' => 'employee@gmail.com',
                'role_id' => 1,
                'password' => bcrypt('12345678')
            ],
            ['name' => 'Employee1',
                'email' => 'employee1@gmail.com',
                'role_id' => 1,
                'password' => bcrypt('12345678')
            ],
            ['name' => 'Employer',
                'email' => 'employer@gmail.com',
                'role_id' => 2,
                'password' => bcrypt('12345678')
            ],
        ];

        User::insert($users);
    }
}
