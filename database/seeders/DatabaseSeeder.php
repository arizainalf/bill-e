<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Ari Zainal Fauziah',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('11221122'),
        ]);

        $tarif = [[
            'user_id' => 1,
            'daya' => 450,
            'tarif' => 415,
        ],
        [
            'user_id' => 1,
            'daya' => 900,
            'tarif' => 605
        ],
        [
            'user_id' => 1,
            'daya' => 1300,
            'tarif' => 1444
        ],
        [
            'user_id' => 1,
            'daya' => 2200,
            'tarif' => 1555
        ],
        [
            'user_id' => 1,
            'daya' => 3500,
            'tarif' => 1699
        ]
    ];

        DB::table('tarifs')->insert($tarif);

    }
}
