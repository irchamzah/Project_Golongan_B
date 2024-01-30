<?php

namespace Database\Factories;

use App\Models\Layanan;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class LayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Layanan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'category_id'=>Category::inRandomOrder()->orderBy('id')->first(),
            'namapj'=>$this->faker->paragraph,
            'alamat'=>$this->faker->paragraph,
            'notelp'=>$this->faker->paragraph,
            'name'=>$this->faker->name,
            'fotosampah'=>$this->faker->paragraph,
            'tanggaljemput'=>$this->faker->paragraph,
            'statuspesanan'=>$this->faker->paragraph,
            'pendapatan'=>$this->faker->paragraph,

        ];
    }
}
