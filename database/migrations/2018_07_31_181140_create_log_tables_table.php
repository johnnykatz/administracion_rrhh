<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogTablesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_tables', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('tabla');
            $table->string('operacion');
            $table->integer('registro_id');
            $table->string('campo');
            $table->text('valor_anterior')->nullable()->default(null);
            $table->text('valor_nuevo')->nullable()->default(null);
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_tables');
    }
}
