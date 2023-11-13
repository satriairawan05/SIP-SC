<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Departemen::create([
            'departemen_name' => 'ENGINEERING',
            'departemen_alias' => 'ENG'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'HEALTY SAFETY & ENVIRONMENT',
            'departemen_alias' => 'HSE'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'COAL & BERGING',
            'departemen_alias' => 'CNB'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'FINANCE ACCOUNTANT & TAX',
            'departemen_alias' => 'FAT'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'HUMAN RESOURCE & GENERAL AFFAIR',
            'departemen_alias' => 'HRGA'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'INFORMATION TECHNOLOGY',
            'departemen_alias' => 'IT'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'LOGISTIC',
            'departemen_alias' => 'LOG'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'PLANT',
            'departemen_alias' => 'PLN'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'PURCHASING',
            'departemen_alias' => 'PUR'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'PRODUCTION',
            'departemen_alias' => 'PRO'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'MANAGEMENT',
            'departemen_alias' => 'MAN'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'OPERATION',
            'departemen_alias' => 'OPR'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'BOARD OF DIRECTOR',
            'departemen_alias' => 'BOD'
        ]);

        \App\Models\Departemen::create([
            'departemen_name' => 'PENANGGUNG JAWAB OPERATIONAL',
            'departemen_alias' => 'PJO'
        ]);
    }
}
