<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'role' => $faker->randomElement(['cooperative', 'commerçant', 'admin']),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'verification_token' => Str::random(60), // Génère un token de vérification aléatoire
                'phone' => $faker->phoneNumber,
                'phone_verified_at' => now(),
                'phone_verification_token' => Str::random(60), // Génère un token
                'address' => $faker->address,
                'city' => $faker->city,
                'remember_token' => Str::random(10), // Génère un token aléatoire de 10 caractères
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
