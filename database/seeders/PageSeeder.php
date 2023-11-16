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
        // Surat Cuti
        \App\Models\Page::create([
            'page_name' => 'Surat Cuti',
            'action' => 'Create',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Surat Cuti',
            'action' => 'Read',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Surat Cuti',
            'action' => 'Update',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Surat Cuti',
            'action' => 'Delete',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Surat Cuti',
            'action' => 'Approval',
        ]);

        // Archive
        \App\Models\Page::create([
            'page_name' => 'Archive',
            'action' => 'Read',
        ]);

        // Account
        \App\Models\Page::create([
            'page_name' => 'User',
            'action' => 'Create',
        ]);

        \App\Models\Page::create([
            'page_name' => 'User',
            'action' => 'Read',
        ]);

        \App\Models\Page::create([
            'page_name' => 'User',
            'action' => 'Update',
        ]);

        \App\Models\Page::create([
            'page_name' => 'User',
            'action' => 'Delete',
        ]);

        // Cuti
        \App\Models\Page::create([
            'page_name' => 'Cuti',
            'action' => 'Create',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Cuti',
            'action' => 'Read',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Cuti',
            'action' => 'Update',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Cuti',
            'action' => 'Delete',
        ]);

        // Departemen
        \App\Models\Page::create([
            'page_name' => 'Departemen',
            'action' => 'Create',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Departemen',
            'action' => 'Read',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Departemen',
            'action' => 'Update',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Departemen',
            'action' => 'Delete',
        ]);

        // Approval
        \App\Models\Page::create([
            'page_name' => 'Approval',
            'action' => 'Create',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Approval',
            'action' => 'Read',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Approval',
            'action' => 'Update',
        ]);

        \App\Models\Page::create([
            'page_name' => 'Approval',
            'action' => 'Delete',
        ]);
    }
}
