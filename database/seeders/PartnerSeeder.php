<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::factory()->create([
            'user_id' => 1,
            'name' => 'Rico Pahlefi',
            'id_number' => '6104182201020002',
            'phone_number' => '089528597031',
            'birthplace' => 'Ketapang',
            'birthday' => '2023-01-22',
            'gender' => 'Perempuan',
            'address' => 'Desa Sungai Awan Kanan',
            'citizenship' => 'WNI',
            'status' => 'Belum Menikah',
            'employment' => 'Pegawai Swasta',
        ]);
    }
}
