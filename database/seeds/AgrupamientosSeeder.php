<?php

use Illuminate\Database\Seeder;

class AgrupamientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\Agrupamiento::firstOrCreate([
            'nombre' => 'ADMINISTRATIVO',
            'descripcion' => null,
            'nombre_corto' => 'A'
        ]);

        \App\Models\Admin\Agrupamiento::firstOrCreate([
            'nombre' => 'AUTORIDAD SUPERIOR',
            'descripcion' => null,
            'nombre_corto' => 'AS'
        ]);

        \App\Models\Admin\Agrupamiento::firstOrCreate([
            'nombre' => 'PROFESIONAL',
            'descripcion' => null,
            'nombre_corto' => 'P'
        ]);
        \App\Models\Admin\Agrupamiento::firstOrCreate([
            'nombre' => 'TECNICO',
            'descripcion' => null,
            'nombre_corto' => 'T'
        ]);

        \App\Models\Admin\Agrupamiento::firstOrCreate([
            'nombre' => 'MAESTRANZA',
            'descripcion' => null,
            'nombre_corto' => 'M'
        ]);
    }
}
