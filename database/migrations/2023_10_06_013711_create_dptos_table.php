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
        Schema::create('dptos', function (Blueprint $table) {
            $table->string('dpt_id', 4)->primary();
            $table->string('dpt_nombre', 100);
            $table->smallInteger('dpt_estado')->comment('1 = Activo, 2 = Inactivo')->default(1)->nullable();
            $table->string('pai_id', 3);                                                                        // Relación de la tabla pais
            $table->foreign('pai_id')->references('pai_id')->on('pais')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('dptos');
    }
};
