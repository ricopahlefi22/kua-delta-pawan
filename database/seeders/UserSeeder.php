<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rico Pahlefi',
            'email' => 'ricopahlefi22@gmail.com',
            'password' => bcrypt('MudahDitebak22!'),
            'id_number' => '6104182201020002',
            'phone_number' => '089528597031',
            'birthplace' => 'Ketapang',
            'birthday' => '2023-01-22',
            'gender' => 'Laki-Laki',
            'address' => 'Desa Sungai Awan Kanan',
            'citizenship' => 'WNI',
            'status' => 'Belum Menikah',
            'employment' => 'Pegawai Swasta',
        ]);
    }
}
