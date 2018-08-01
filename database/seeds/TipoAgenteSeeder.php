<?php

use Illuminate\Database\Seeder;

class TipoAgenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\TipoAgente::firstOrCreate([
            'nombre' => 'AGENTE DEL MINISTERIO',
            'nombre_corto' => 'AG. DEL MIN.'
        ]);

        \App\Models\Admin\TipoAgente::firstOrCreate([
            'nombre' => 'ADSCRIPTO DE OTRO ORGANISMO',
            'nombre_corto' => 'ADSC. DE OTRO ORG.'
        ]);
    }
}
