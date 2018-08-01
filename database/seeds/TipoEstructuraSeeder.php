<?php

use Illuminate\Database\Seeder;

class TipoEstructuraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 1,
            'nombre' => 'MINISTRO',
            'nombre_corto' => 'MIN.',
            'slug' => 'ministro'
        ]);
        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 2,
            'nombre' => 'ASESORIA',
            'nombre_corto' => 'ASES.',
            'slug' => 'asesoria'
        ]);
        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 3,
            'nombre' => 'GABINETE',
            'nombre_corto' => 'GAB.',
            'slug' => 'gabinete'
        ]);
        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 4,
            'nombre' => 'ASESORIA Y APOYO',
            'nombre_corto' => 'ASES. Y AP.',
            'slug' => 'asesoria-y-apoyo'
        ]);
        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 5,
            'nombre' => 'SECRETARIA PRIVADA',
            'nombre_corto' => 'SEC. PRIV.',
            'slug' => 'seretaria-privada'
        ]);
        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 6,
            'nombre' => 'SUBSECRETARIA',
            'nombre_corto' => 'SUBS.',
            'slug' => 'subsecretaria'
        ]);
        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 7,
            'nombre' => 'DIRECCION GENERAL',
            'nombre_corto' => 'DIREC. GRAL.',
            'slug' => 'direccion-general'
        ]);
        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 8,
            'nombre' => 'DIRECCION',
            'nombre_corto' => 'DIREC.',
            'slug' => 'direccion'
        ]);
        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 9,
            'nombre' => 'DEPARTAMENTO',
            'nombre_corto' => 'DPTO.',
            'slug' => 'departamento'
        ]);

        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 10,
            'nombre' => 'PROYECTO',
            'nombre_corto' => 'PROY.',
            'slug' => 'proyecto'
        ]);

        \App\Models\Admin\TipoEstructura::firstOrCreate([
            'id' => 11,
            'nombre' => 'EXTERNO',
            'nombre_corto' => 'EXT.',
            'slug' => 'externo'
        ]);
    }
}
