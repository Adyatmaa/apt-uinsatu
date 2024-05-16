<?php

namespace Database\Factories;

use App\Models\DTendik;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DTendik>
 */
class DTendikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DTendik::class;

    public function definition(): array
    {
        return [
            'nip_nik_tendik' => $this->faker->unique()->numerify('###############'),
            'nama_tendik' => $this->faker->name,
            'id_jabatan_tendik' => $this->faker->numberBetween(1, 8),
            'bukti' => 'Valid',
            'keterangan' => 'Valid',
        ];
    }
}
