<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\integer;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('players')->insert([
            'name' => Str::random(10),
            'club' => Str::random(10),
            'number' => 10,
            'image' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
