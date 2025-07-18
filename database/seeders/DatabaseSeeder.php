<?php

namespace Database\Seeders;

// Removed: use App\Models\User; // No longer needed if you don't have a users table
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AgentSeeder::class);

    }
}
