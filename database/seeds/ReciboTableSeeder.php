<?php

use Illuminate\Database\Seeder;

class ReciboTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Modelos\Recibo::class,20)->create();
    }
}
