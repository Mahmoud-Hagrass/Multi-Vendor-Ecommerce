<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nameEn = fake()->words(2 , true);
        $nameAr = fake('ar_SA')->words(2 , true);

        return [
            'name'      => [
                'en' => $nameEn ,
                'ar' => $nameAr ,
            ] ,
            'slug'      => Str::slug($nameEn) ,
            'parent_id' => null ,
            'status'    => rand(0,1) ,
        ];
    }
}
