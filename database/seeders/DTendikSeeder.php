<?php

namespace Database\Seeders;

use App\Models\DTendik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DTendikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DTendik::factory()->count(100)->create();
    }
}
