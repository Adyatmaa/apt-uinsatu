<?php

namespace Database\Seeders;

use App\Models\DtDosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DtDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DtDosen::factory()->count(100)->create();
    }
}
