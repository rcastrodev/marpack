<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'=> Company::first()->id,
            'address'   => 'Av. Segunda Rivadavia 22800. Ituzaingó',
            'email'     => 'info@marpack.com.ar',
            'phone1'    => '+54 11 4661-3061 / 4624-6893',
            'phone2'    => '4-844-2161',
            'logo_header'=> 'images/data/Group_3298.png',
            'logo_footer'=> 'images/data/Group_3416.png'
        ]);
    }
}
