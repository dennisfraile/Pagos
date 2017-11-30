<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Modelos\Recibo::class, function (Faker $faker) {
    //static $password;
    return [
      'nic' => $faker->numberBetween($min = 1000000, $max = 9999999),
      'monto_total' => $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 150),
      'fecha_emision' => $faker->date($format = 'd/m/Y', $max = 'now'),
      'fecha_inicio' => $faker->date($format = 'd/m/Y', $max = 'now'),
      'fecha_fin' => $faker->date($format = 'd/m/Y', $max = 'now'),
      'fecha_vencimiento' => $faker->date($format = 'd/m/Y', $max = 'now'),
      'tipo_recibo' => $faker->numberBetween($min = 1, $max = 4),
      'id_usuario' => $faker->numberBetween($min = 1, $max = 2),
      'estado' => 0
    ];
});
