<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => json_encode(['en' => 'Admin', 'ar' => 'أدمن']),
            'email' => 'admin@gmail.com',
            'phone' => '0599999999',
            'password' => 'admin@123',
            'type' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'phone' => '0566666666',
            'password' => 'customer@123',
            'type' => 'customer',
        ]);
    }
}
