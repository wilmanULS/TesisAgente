<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_cat_asignatura', function (Blueprint $table) {
            $table->increments('as_id');
            $table->varchar('as_nombre');
           $table->integer('as_nivel');
            $table->integer('as_num_credito');
             $table->integer('as_antecesor');
            $table->binary('as_estado');
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
        Schema::dropIfExists('t_cat_asignatura');
    }
}
