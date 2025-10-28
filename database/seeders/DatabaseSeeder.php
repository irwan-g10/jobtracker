<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use App\Models\JobPosition;
use App\Models\JobResource;
use App\Models\JobStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat data master dulu

    // Buat data referensi dulu
        JobPosition::factory(5)->create();
        JobStatus::factory(2)->create();
        JobResource::factory(4)->create();

        // Baru buat data job, karena tabel di atas sudah ada datanya
        Job::factory(10)->create();


    }
}
