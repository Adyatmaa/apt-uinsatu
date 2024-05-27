<?php

namespace Database\Seeders;

use App\Models\DetailCalonMahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailCalonMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailCalonMahasiswa::factory()->count(50)->create();

    }
}
