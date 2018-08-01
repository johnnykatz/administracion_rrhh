<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('apellido');
            $table->string('nombre');
            $table->string('dni');
            $table->boolean('activo')->default(true);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('legajo')->nullable();
            $table->string('categoria')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('titulo')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('telefono_otro')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('foto')->nullable();
            $table->string('numero_tarjeta')->nullable();
            $table->text('observacion')->nullable();
            $table->boolean('tramite_jubilacion')->default(false);
            $table->integer('estado_relacion_id')->unsigned();
            $table->integer('tipo_agente_id')->unsigned();
            $table->integer('genero_id')->unsigned();
            $table->timestamps();

            $table->foreign('estado_relacion_id')->references('id')->on('estados_relaciones');
            $table->foreign('tipo_agente_id')->references('id')->on('tipos_agentes');
            $table->foreign('genero_id')->references('id')->on('generos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agentes');
    }
}
