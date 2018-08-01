<?php

use Illuminate\Database\Seeder;

class EstadoRelacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\EstadoRelacion::firstOrCreate([
            'nombre' => 'PLANTA PERMANENTE',
            'nombre_corto' => 'P'
        ]);

        \App\Models\Admin\EstadoRelacion::firstOrCreate([
            'nombre' => 'TEMPORAL',
            'nombre_corto' => 'T'
        ]);
    }
}
