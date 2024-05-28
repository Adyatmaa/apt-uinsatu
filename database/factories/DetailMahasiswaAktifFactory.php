<?php

namespace Database\Factories;

use App\Models\DetailMahasiswaAktif;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailMhsAktif>
 */
class DetailMahasiswaAktifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DetailMahasiswaAktif::class;
    public function definition(): array
    {
        return [
            'id_data_mhs_aktif' => $this->faker->numberBetween(1, 5),
            'id_prodi' => $this->faker->numberBetween(1, 46),
            'jml_mhs_aktif' => $this->faker->numberBetween(100, 200),
            'jml_mhs_transfer' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
