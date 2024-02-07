<?php

namespace Database\Seeders;

use App\Models\Program;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Program::insert([
            [
                "name" => "Summer Camp",
                "registration_fee" => 25,
                "deposit_fee" => 200
            ],
            [
                "name" => "Vacation Camp",
                "registration_fee" => 0,
                "deposit_fee" => 0,
            ],
            [
                "name" => "Before or After School",
                "registration_fee" => 25,
                "deposit_fee" => 100,
            ]
        ]);
    }
}
