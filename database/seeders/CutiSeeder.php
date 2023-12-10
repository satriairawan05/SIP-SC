<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Cuti::create([
            'cuti_jenis' => 'Cuti Lapangan',
            'cuti_jumlah' => '14'
        ]);

        \App\Models\Cuti::create([
            'cuti_jenis' => 'Cuti Tahunan',
            'cuti_jumlah' => '12'
        ]);

        \App\Models\Cuti::create([
            'cuti_jenis' => 'Cuti Hamil/Melahirkan',
            'cuti_jumlah' => '45'
        ]);
    }
}
