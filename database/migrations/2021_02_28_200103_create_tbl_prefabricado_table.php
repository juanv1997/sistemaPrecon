<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPrefabricadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_prefabricado', function (Blueprint $table) {
            $table->id('pre_id');
            $table->string('pre_codigo');
            $table->unsignedBigInteger('capa_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('dimension_id')->nullable();
            $table->unsignedBigInteger('espesor_id')->nullable();
            $table->unsignedBigInteger('resistencia_id')->nullable();
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->unsignedBigInteger('unidad_id')->nullable();
            $table->foreign('capa_id')->references('capa_id')->on('tbl_capa')->onDelete('set null');
            $table->foreign('color_id')->references('color_id')->on('tbl_color')->onDelete('set null');
            $table->foreign('dimension_id')->references('dimension_id')->on('tbl_dimension')->onDelete('set null');
            $table->foreign('espesor_id')->references('espesor_id')->on('tbl_espesor')->onDelete('set null');
            $table->foreign('resistencia_id')->references('resistencia_id')->on('tbl_resistencia')->onDelete('set null');
            $table->foreign('tipo_id')->references('tipo_id')->on('tbl_tipo')->onDelete('set null');
            $table->foreign('unidad_id')->references('unidad_id')->on('tbl_unidad')->onDelete('set null');
            $table->double('pre_precio',8,2);
            $table->integer('pre_stock');
            $table->double('pre_importe',8,2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_prefabricado');
    }
}
