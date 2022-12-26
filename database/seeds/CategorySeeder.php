<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Aluminios y Film', 'image' => 'images/category/Mask_Group_190.png']);
        Category::create(['name' => 'Artículos de Librería', 'image' => 'images/category/Mask_Group_188.png']);
        Category::create(['name' => 'Blondas', 'image' => 'images/category/Image_178.png']);
        Category::create(['name' => 'Cotillón', 'image' => 'images/category/Image_179.png']);
        Category::create(['name' => 'Expandido Térmico', 'image' => 'images/category/Image_180.png']);
        Category::create(['name' => 'Friselina', 'image' => 'images/category/Image_181.png']);
        Category::create(['name' => 'Pirotines', 'image' => 'images/category/Image_182.png']);
        Category::create(['name' => 'Papel y Cartón', 'image' => 'images/category/Image_183.png']);
    }
}
