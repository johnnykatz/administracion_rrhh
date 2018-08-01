<?php

use Illuminate\Database\Seeder;

class EstructuraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\Estructura::firstOrCreate([
            'id' => 1,
            'nombre' => 'EN TRAMITE',
            'nombre_corto' => 'E/T',
            'estructura_padre' => null,
            'tipo_estructura_id' => 1
        ]);

    }
}
