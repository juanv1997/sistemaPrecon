<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_salida', function (Blueprint $table) {
            $table->id('salida_id');
            $table->unsignedBigInteger('pre_id')->nullable();
            $table->unsignedBigInteger('material_id')->nullable();
            $table->foreign('pre_id')->references('pre_id')->on('tbl_prefabricado')->onDelete('set null');
            $table->foreign('material_id')->references('material_id')->on('tbl_material')->onDelete('set null');
            $table->integer('salida_cantidad');
            $table->date('salida_fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_salida');
    }
}
