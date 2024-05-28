<?php

namespace Database\Factories;

use App\Models\DetailMhsLulus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailMhsLulus>
 */
class DetailMhsLulusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DetailMhsLulus::class;

    public function definition(): array
    {
        return [
            'id_data_mhs_lulus' => $this->faker->numberBetween(1, 5),
            'id_prodi' => $this->faker->numberBetween(1, 46),
            'jml_lulusan' => $this->faker->numberBetween(100, 200),
            'rerata_ipk' => $this->faker->randomFloat(1,3,4),
            'rerata_masa_studi' => $this->faker->numberBetween(3,4),
        ];
    }
}
