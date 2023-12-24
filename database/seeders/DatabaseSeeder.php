<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Counter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        for($i = 0; $i < 5; $i++) {
            Counter::create([
                'ip' => '127.0.0.1',
                'country/city' => 'Москва',
                'user-agent' => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb",
                'created_at' => Carbon::now()->format('Y-m-d'). '1'. rand(0,9). ':11:13',
                'updated_at' => Carbon::now()->format('Y-m-d'). '1'. rand(0,9). ':11:13',
            ]);
        };

        // for($i = 0; $i < 30; $i++) {
        //     $randUser = rand(0, 9). rand(0, 9). rand(0, 9). rand(0, 9). rand(0, 9);
        //     User::create([
        //         'email' => $randUser. '@example.com',
        //         'email_verified_at' => now(),
        //         'password' => Hash::make($randUser),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        //}
    }
}
