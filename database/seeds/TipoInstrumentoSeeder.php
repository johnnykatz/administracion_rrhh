<?php

use Illuminate\Database\Seeder;

class TipoInstrumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\TipoInstrumento::firstOrCreate([
            'nombre' => 'EN TRAMITE',
            'nombre_corto' => 'E/T'
        ]);

        \App\Models\Admin\TipoInstrumento::firstOrCreate([
            'nombre' => 'DECRETO',
            'nombre_corto' => 'DCTO.'
        ]);
        \App\Models\Admin\TipoInstrumento::firstOrCreate([
            'nombre' => 'RESOLUCION',
            'nombre_corto' => 'RESOL.'
        ]);
        \App\Models\Admin\TipoInstrumento::firstOrCreate([
            'nombre' => 'DISPOSICION',
            'nombre_corto' => 'DISP.'
        ]);
    }
}
