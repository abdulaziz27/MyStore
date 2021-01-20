<?php

namespace Database\Factories;

use App\Models\Latihan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LatihanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Latihan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_murid' => $this->faker->userName(),
            'status_murid' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'nilai_tugas' => $this->faker->numberBetween($min = 0, $max = 100),
            'nilai_pts' => $this->faker->numberBetween($min = 0, $max = 100),
            'nilai_uas' => $this->faker->numberBetween($min = 0, $max = 100),
        ];
    }
}
