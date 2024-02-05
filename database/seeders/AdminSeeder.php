<?php

namespace Database\Seeders;

use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::factory()->create([
            "name" => "Super Admin",
            "email" => "super_admin.tsladventures@gmail.com",
            "password" => Hash::make('password'),
            "is_super_admin" => true,
            "admin_id" => null
        ]);
    }
}
