<?php

namespace Database\Factories;

use App\Models\DataCalonMahasiswa;
use App\Models\DetailCalonMahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailCalonMahasiswa>
 */
class DetailCalonMahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DetailCalonMahasiswa::class;
    public function definition(): array
    {
        return [
            'id_data_calon_mahasiswa' => $this->faker->numberBetween(1, 5),
            'id_prodi' => $this->faker->numberBetween(1, 46),
            'daya_tampung' => $this->faker->numberBetween(100, 200),
            'pendaftar' => $this->faker->numberBetween(100, 1000),
            'lulus_seleksi' => $this->faker->numberBetween(100, 200),
            'mhs_registrasi' => $this->faker->numberBetween(100, 1000),
            'mhs_transfer' => $this->faker->numberBetween(10, 100),
        ];
    }
}
