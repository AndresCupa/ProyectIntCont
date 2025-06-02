<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->string('ciu_id', 6)->primary();
            $table->string('ciu_nombre', 100);
            $table->smallInteger('ciu_estado')->comment('1 = Activo, 2 = Inactivo')->default(1)->nullable();
            $table->string('dpt_id', 4);                                                                        // Relación de la tabla dptos
            $table->foreign('dpt_id')->references('dpt_id')->on('dptos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ciudades');
    }
};
