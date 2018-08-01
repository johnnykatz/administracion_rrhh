<?php

use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\Genero::firstOrCreate([
            'id' => 1,
            'nombre' => 'FEMENINO',
            'nombre_corto' => 'F'
        ]);
        \App\Models\Admin\Genero::firstOrCreate([
            'id' => 2,
            'nombre' => 'MASCULINO',
            'nombre_corto' => 'M'
        ]);

    }
}
