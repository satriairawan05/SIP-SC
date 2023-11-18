<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'super.admin@coalindo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'group_id' => 1,
            'departemen_id' => null,
            'jabatan' => 'Admin Head Office',
            'lokasi_kerja' => 'Head Office Coalindo',
            'tgl_masuk' => \Carbon\Carbon::now()
        ]);

        \App\Models\User::factory(49)->create();
    }
}
