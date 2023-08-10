<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//         User::factory()->create([
//             'name' => 'admin',
//             'email' => 'admin@gmail.com',
//             'password' => '123456',
//         ]);

        User::firstOrCreate(
            ['email' => 'admin@gmail.com'

            ], [
                'name' => 'admin',
//                'password' => bcrypt('123456'),
                'password' => '123456',
            ]
        );

    }
}
