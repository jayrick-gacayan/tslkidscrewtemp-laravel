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
        Admin::insert(
            [
                [
                    "name" => "Super Admin",
                    "email" => "super_admin.tsladventures@gmail.com",
                    "password" => Hash::make('password'),
                    "is_super_admin" => true,
                    "admin_id" => 1
                ],
                [
                    "name" => "Super Admin Two",
                    "email" => "super_admin_two.tsladventures@gmail.com",
                    "password" => Hash::make('password'),
                    "is_super_admin" => true,
                    "admin_id" => 1
                ],
                [
                    "name" => "Super Admin Three",
                    "email" => "super_admin_three.tsladventures@gmail.com",
                    "password" => Hash::make('password'),
                    "is_super_admin" => true,
                    "admin_id" => 1
                ]
            ],
        );
    }
}
