<?php

use Illuminate\Database\Seeder;

class UnidadOrganizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\UnidadOrganizacion::firstOrCreate([
            'codigo' => '01',
            'nombre' => 'UNIDAD SUPERIOR',
            'nombre_corto' => 'U. SUP.'
        ]);
        \App\Models\Admin\UnidadOrganizacion::firstOrCreate([
            'codigo' => '02',
            'nombre' => 'SUBSECRETARIA DE ACCION SOCIAL',
            'nombre_corto' => 'SUBS. A. S.'
        ]);
        \App\Models\Admin\UnidadOrganizacion::firstOrCreate([
            'codigo' => '03',
            'nombre' => 'SUBSECRETARIA DE LA MUJER Y LA FAMILIA',
            'nombre_corto' => 'SUBS. M. y F.'
        ]);

        \App\Models\Admin\UnidadOrganizacion::firstOrCreate([
            'codigo' => '04',
            'nombre' => 'SUBSECRETARIA DE LA JUVENTUD',
            'nombre_corto' => 'SUBS. JUB.'
        ]);

        \App\Models\Admin\UnidadOrganizacion::firstOrCreate([
            'codigo' => '06',
            'nombre' => 'SUBSECRETARIA DE DERECHOS ECONOMICOS, SOCIALES Y CULTURALES',
            'nombre_corto' => 'SUBS. D. E. S. y C.'
        ]);
    }
}
