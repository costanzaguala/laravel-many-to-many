<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Project;
use App\Models\Type;


// Helpers per slug
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

//importazione carbon
use Carbon\Carbon;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
    {
        Schema::disableForeignKeyConstraints();

        Project::truncate();

        Schema::enableForeignKeyConstraints();
        for ($i = 0; $i < 10; $i++) {
            $rndType = Type::inRandomOrder()->first();

            $name = fake()->sentence();
            $slug = Str::slug($name);
            $project = Project::create([
                'name' => $name,
                'slug' => $slug,
                'description' => fake()->paragraph(),
                'creation_date'=>Carbon::now(),
                'type_id'=> $rndType->id,
            ]);
        }
    }
}