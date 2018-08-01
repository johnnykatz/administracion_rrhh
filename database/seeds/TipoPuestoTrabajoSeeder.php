<?php

use Illuminate\Database\Seeder;

class TipoPuestoTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 1,
            'nombre' => 'EN TRAMITE',
            'nombre_corto' => 'E/T.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 2,
            'nombre' => 'AUXILIAR',
            'nombre_corto' => 'AUX.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 3,
            'nombre' => 'DIRECTOR/A',
            'nombre_corto' => 'DIREC.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 4,
            'nombre' => 'DIRECTOR/A GENERAL',
            'nombre_corto' => 'DIREC. GRAL.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 5,
            'nombre' => 'JEFE/A',
            'nombre_corto' => 'JEFE/A'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 6,
            'nombre' => 'RESPONSABLE',
            'nombre_corto' => 'RESP.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 7,
            'nombre' => 'A CARGO',
            'nombre_corto' => 'A/C'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 8,
            'nombre' => 'MINISTRO',
            'nombre_corto' => 'MINISTRO'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 9,
            'nombre' => 'ASESOR/A',
            'nombre_corto' => 'ASESOR/A'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 10,
            'nombre' => 'PROMOTOR/A',
            'nombre_corto' => 'PROM.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 11,
            'nombre' => 'OPERADOR/A',
            'nombre_corto' => 'OPER.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 12,
            'nombre' => 'CHOFER',
            'nombre_corto' => 'CHOFER'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 13,
            'nombre' => 'COORDINADOR/A',
            'nombre_corto' => 'COORD.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 14,
            'nombre' => 'MAESTRANZA',
            'nombre_corto' => 'MAEST.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 15,
            'nombre' => 'PLAYERO',
            'nombre_corto' => 'PLAY.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 16,
            'nombre' => 'PROFESIONAL',
            'nombre_corto' => 'PROF.'
        ]);

        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 17,
            'nombre' => 'SECRETARIO/A PRIVADA',
            'nombre_corto' => 'SECRE. P.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 18,
            'nombre' => 'SECRETARIO/A',
            'nombre_corto' => 'SECRE.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 19,
            'nombre' => 'SUBSECRETARIO/A',
            'nombre_corto' => 'SUBS.'
        ]);
        \App\Models\Admin\TipoPuestoTrabajo::firstOrCreate([
            'id' => 20,
            'nombre' => 'TECNICO/A',
            'nombre_corto' => 'TECN.'
        ]);
    }
}
