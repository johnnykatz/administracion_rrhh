<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Users::class);
        $this->call(MinisterioSeeder::class);
        $this->call(AgrupamientosSeeder::class);
        $this->call(EstadoRelacionSeeder::class);
        $this->call(SituacionLaboralSeeder::class);
        $this->call(TipoAgenteSeeder::class);
        $this->call(TipoEstructuraSeeder::class);
        $this->call(TipoInstrumentoSeeder::class);
        $this->call(TipoPuestoTrabajoSeeder::class);
        $this->call(UnidadOrganizacionSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(EstructuraSeeder::class);
    }
}
