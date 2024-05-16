<?php

namespace Database\Factories;

use App\Models\DtDosen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DtDosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DtDosen::class;

    public function definition(): array
    {
        return [
            'nip_nik_dosen' => $this->faker->unique()->numerify('###############'), // 16 digit unique number
            'nama_dosen' => $this->faker->name,
            'id_prodi' => $this->faker->numberBetween(1, 46),
            'id_jabatan_akademik_dosen' => $this->faker->numberBetween(1, 4),
            'id_pendidikan_terakhir' => $this->faker->numberBetween(1, 3),
            'is_sertifikasi' => $this->faker->boolean,
            'is_tetap' => $this->faker->boolean,
        ];
    }
}
