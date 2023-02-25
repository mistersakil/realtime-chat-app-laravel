<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'              => 'Super Admin',
            'email'             => 'admin@gmail.com',
            'mobile_number'     => '01720092787',
            'password'          => '12345678#',
            'status'            => 1,
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        User::create([
            'name'              => 'sakil jomadder',
            'email'             => 'sakil@gmail.com',
            'mobile_number'     => '01720092788',
            'password'          => '12345678#',
            'status'            => 1,
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name'          => fake()->name(),
                'email'         => fake()->unique()->safeEmail(),
                'mobile_number' => fake()->unique()->phoneNumber(),
                'status'        => rand(0, 1),
                'password'      => '12345678#',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
