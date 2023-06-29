<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombreEs = fake()->name();
        $nombreEn = fake()->name();
        $slugEs = Str::slug($nombreEs, '-');
        $slugEn = Str::slug($nombreEn, '-');
        return [
            'nombre_es' => $nombreEs,
            'nombre_en' => $nombreEn,
            'slug_es' => $slugEs,
            'slug_en' => $slugEn,
            'precio_adulto' => fake()->randomFloat(2 , 2000 , 6),
            'precio_menor' => fake()->randomFloat(2 , 1000 , 6),
            'img_banner' => fake()->imageUrl(),
            'img_portada' => fake()->imageUrl(400 , 800),
        ];
    }
}
