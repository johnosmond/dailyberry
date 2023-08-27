<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = 'XPeX2Wr$CjPg';
        $hash = password_hash($password, PASSWORD_BCRYPT);
        User::create([
            'name' => 'John',
            'email' => 'support@sweetberries.com',
            'email_verified_at' => now(),
            'password' => $hash,
        ]);

        User::create([
            'name' => 'Jane',
            'email' => 'jane@sweetberries.com',
            'email_verified_at' => now(),
            'password' => $hash,
        ]);

        User::create([
            'name' => 'Janice',
            'email' => 'janice@sweetberries.com',
            'email_verified_at' => now(),
            'password' => $hash,
        ]);

        User::create([
            'name' => 'Gian',
            'email' => 'gian@sweetberries.com',
            'email_verified_at' => now(),
            'password' => $hash,
        ]);

        User::create([
            'name' => 'Cindy',
            'email' => 'cin4gators@gmail.com',
            'email_verified_at' => now(),
            'password' => $hash,
        ]);

        User::create([
            'name' => 'Brandon',
            'email' => 'gatoroz@yahoo.com',
            'email_verified_at' => now(),
            'password' => $hash,
        ]);
    }
}
