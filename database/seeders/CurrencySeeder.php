<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'name'  => 'Dolar',
            'rate'  => '5.978',        
        ]);

        Currency::create([
            'name'  => 'Euro',
            'rate'  => '6.124',        
        ]);
    }
}
