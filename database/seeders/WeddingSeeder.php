<?php

namespace Database\Seeders;

use App\Models\Wedding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wedding::factory(22)->create([
            'user_id' => 1,
            'date' => '2023-06-23',
            'time' => '10:00:00',
            'married_on_office' => true,
        ]);

        Wedding::factory(46)->create([
            'user_id' => 1,
            'date' => '2023-06-23',
            'time' => '10:00:00',
            'married_on_office' => true,
        ]);
        Wedding::factory(76)->create([
            'user_id' => 1,
            'date' => '2023-05-23',
            'time' => '10:00:00',
            'married_on_office' => true,
        ]);

        Wedding::factory(120)->create([
            'user_id' => 1,
            'date' => '2022-06-23',
            'time' => '10:00:00',
            'married_on_office' => true,
        ]);

        Wedding::factory(60)->create([
            'user_id' => 1,
            'date' => '2023-07-23',
            'time' => '10:00:00',
            'married_on_office' => true,
        ]);

        Wedding::factory(70)->create([
            'user_id' => 1,
            'date' => '2023-05-23',
            'time' => '10:00:00',
            'married_on_office' => true,
        ]);

        Wedding::factory(83)->create([
            'user_id' => 1,
            'date' => '2023-08-23',
            'time' => '10:00:00',
            'married_on_office' => true,
        ]);

        Wedding::factory(72)->create([
            'user_id' => 1,
            'date' => '2023-09-23',
            'time' => '10:00:00',
            'married_on_office' => true,
        ]);
    }
}
