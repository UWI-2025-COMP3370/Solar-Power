<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@work.com',
            'password' => Hash::make('12345678'),
            'role' => 'piDSSAdministrator',
            'email_verified_at' => now()
        ]);

        User::factory()->create([
            'name' => 'technician',
            'email' => 'technician@work.com',
            'password' => Hash::make('12345678'),
            'role' => 'piDSSTechnician',
            'email_verified_at' => now()
        ]);

        User::factory()->create([
            'name' => 'salesclerk',
            'email' => 'sales@work.com',
            'password' => Hash::make('12345678'),
            'role' => 'piDSSSalesClerk',
            'email_verified_at' => now()
        ]);
 
        $this->call([
            ItemSeeder::class,
        ]);
    }
}
