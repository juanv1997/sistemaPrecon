<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_entrada', function (Blueprint $table) {

            $table->id('entrada_id');
            $table->unsignedBigInteger('pre_id')->nullable();
            $table->unsignedBigInteger('material_id')->nullable();
            $table->foreign('pre_id')->references('pre_id')->on('tbl_prefabricado')->onDelete('set null');
            $table->foreign('material_id')->references('material_id')->on('tbl_material')->onDelete('set null');
            $table->integer('entrada_cantidad');
            $table->date('entrada_fecha');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_entrada');
    }
}
