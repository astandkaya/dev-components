<?php

namespace Database\Seeders;

use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::factory(10)->sequence(fn (Sequence $sequence) => [
            'name' => 'Test Admin '.($sequence->index + 1),
            'email' => 'admin'.($sequence->index + 1).'@example.com',
        ])->create();
    }
}
