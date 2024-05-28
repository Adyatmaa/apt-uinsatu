<?php

namespace Database\Seeders;

use App\Models\DetailMahasiswaAktif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailMahasiswaAktifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailMahasiswaAktif::factory()->count(50)->create();

    }
}
