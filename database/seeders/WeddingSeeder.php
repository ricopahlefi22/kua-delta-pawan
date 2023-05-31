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
        Wedding::factory()->create([
            'date' => '',
            'time' => '',
            'married_on_office' => ''
        ]);
    }
}
