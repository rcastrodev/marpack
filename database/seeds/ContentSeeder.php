<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/Mask_Group_189.png',
                'content_1' => 'marpack',
                'content_2' => 'envases y embalajes',
            ]);
        }

        /** Fin home page */

        /** Empresa  */
       for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id'    => 2,
                'order'         => 'AA',
                'image'         => 'images/company/Mask_Group_198.png',
            ]);
        }

        /** Descripción de empresa */
        Content::create([
            'section_id' => 3,
            'content_1' => 'Marpack',
            'content_2' => '<p>Somos una empresa jóven y dinámica, con más de 20 años en el rubro papelero, inicialmente enfocados en la venta minorista hoy somos un fuerte referente en venta mayorista con distribución a todo el país.</p><p>En Papelera Sur desde nuestros comienzos nos propusimos un objetivo: generar con nuestros clientes una relación duradera de confianza y respeto y lo logramos en estos 20 años de trabajo y esfuerzo.</p><p>Nuestro desafio es ser la Papelera lider lider en innovación, precio y variedad de productos, cumpliendo con las necesidades de nuestros clientes en tiempo y forma desde Temperley a todo el país.</p>',
            'content_3' => '<p>Desde un pequeño local de la calle Pasco, Papelera Sur hace sus primeros pasos en el rubro de la mano de Juan Carlos Rodriguez que con su gran don de vendedor nato en muy poco tiempo genera una gran clientela, haciendo que Papelera Sur sea la opción adecuada en venta mayorista en todos los artículos relacionados con embalaje, packaging y paquetería comercial, línea gastronómica, higiene, librería descartables, etc, etc...</p><p>Hoy la nueva generación familiar hace que en Papelera Sur encuentres Todo lo que imaginás y más.</p>',
        ]);
    }
}
