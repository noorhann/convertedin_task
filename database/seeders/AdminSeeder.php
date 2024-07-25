<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@admin.com'], 
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password')
            ]
        );
        Admin::factory()->count(100)->create();
    }
}
