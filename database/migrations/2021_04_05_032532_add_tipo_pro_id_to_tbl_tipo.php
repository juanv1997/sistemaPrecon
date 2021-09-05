<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoProIdToTblTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_tipo', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_pro_id')->nullable();
            $table->foreign('tipo_pro_id')->references('tipo_pro_id')->on('tbl_tipo_producto')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_tipo', function (Blueprint $table) {
            //
        });
    }
}
