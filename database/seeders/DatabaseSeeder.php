<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Mohi',
            'email' => 'e.mohamadhosein@gmail.com',
            'is_admin' => true,
        ]);

        User::factory(5)->create();

        \App\Models\Listing::factory(20)->create([
            'by_user_id' => 1
        ]);

        \App\Models\Listing::factory(15)->create([
            'by_user_id' => 2
        ]);
    }
}
