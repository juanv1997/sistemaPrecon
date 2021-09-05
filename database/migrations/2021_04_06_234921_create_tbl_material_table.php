<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_material', function (Blueprint $table) {
            $table->id('material_id');
            $table->string('material_cod',20);
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->unsignedBigInteger('unidad_id')->nullable();
            $table->foreign('tipo_id')->references('tipo_id')->on('tbl_tipo')->onDelete('set null');
            $table->foreign('unidad_id')->references('unidad_id')->on('tbl_unidad')->onDelete('set null');
            $table->double('material_precio',8,2);
            $table->string('material_descrip',100);
            $table->string('material_observacion',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_material');
    }
}
