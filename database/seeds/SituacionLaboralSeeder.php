<?php

use Illuminate\Database\Seeder;

class SituacionLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\SituacionLaboral::firstOrCreate([
            'id' => 1,
            'nombre' => 'NORMAL',
            'nombre_corto' => 'N'
        ]);

        \App\Models\Admin\SituacionLaboral::firstOrCreate([
            'id' => 2,
            'nombre' => 'ADSCRIPTO',
            'nombre_corto' => 'ADSC'
        ]);
        \App\Models\Admin\SituacionLaboral::firstOrCreate([
            'id' => 3,
            'nombre' => 'LICENCIA GREMIAL',
            'nombre_corto' => 'LIC. G.'
        ]);

        \App\Models\Admin\SituacionLaboral::firstOrCreate([
            'id' => 4,
            'nombre' => 'LICENCIA SIN GOCE DE HABERES',
            'nombre_corto' => 'LIC. S/G/H'
        ]);
    }
}
