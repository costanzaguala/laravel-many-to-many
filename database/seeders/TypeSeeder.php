<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            type::truncate();
        });

        $allCategories = [
            'HTML',
            'CSS',
            'Bootstrap',
            'JavaScript',
            'Vue',
            'SQL',
            'PHP',
            'Laravel'
        ];

        foreach ($allCategories as $singleCategory) {
            $category = type::create([
                'title' => $singleCategory
            ]);
        }

        foreach ($allCategories as $singleCategory) {
            $category = type::create([
                'name' => $singleCategory
            ]);
        }
    }
}