<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePuestoTrabajosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos_trabajos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('numero_instrumento')->nullable();
            $table->date('fecha_instrumento')->nullable();
            $table->boolean('activo')->default(true);
            $table->text('observacion')->nullable();
            $table->integer('tipo_instrumento_id')->unsigned()->nullable();
            $table->integer('estructura_id')->unsigned()->nullable();
            $table->integer('agente_id')->unsigned();
            $table->integer('situacion_laboral_id')->unsigned();
            $table->integer('agrupamiento_id')->unsigned()->nullable();
            $table->integer('unidad_organizacion_id')->unsigned()->nullable();
            $table->integer('tipo_puesto_trabajo_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('tipo_instrumento_id')->references('id')->on('tipos_instrumentos');
            $table->foreign('estructura_id')->references('id')->on('estructuras');
            $table->foreign('agente_id')->references('id')->on('agentes');
            $table->foreign('situacion_laboral_id')->references('id')->on('situaciones_laborales');
            $table->foreign('agrupamiento_id')->references('id')->on('agrupamientos');
            $table->foreign('unidad_organizacion_id')->references('id')->on('unidades_organizaciones');
            $table->foreign('tipo_puesto_trabajo_id')->references('id')->on('tipos_puestos_trabajos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('puestos_trabajos');
    }
}
