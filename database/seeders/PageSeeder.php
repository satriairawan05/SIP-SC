<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        \App\Models\Page::create([
            'page_name' => 'Dashboard',
            'action' => 'Read',
        ]);
    }
}
