<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['name' => 'inicio']);
        Page::create(['name' => 'empresa']);
        Page::create(['name' => 'categorias']);
        Page::create(['name' => 'categoria']);
        Page::create(['name' => 'productos']);
        Page::create(['name' => 'producto']);
        Page::create(['name' => 'cotizacion']);
        Page::create(['name' => 'contacto']);
    }
}
