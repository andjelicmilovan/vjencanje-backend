<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vjencanje')->unsigned();
            $table->foreign('vjencanje')->references('id')->on('vjencanjes');
            $table->bigInteger('dokument')->unsigned();
            $table->foreign('dokument')->references('id')->on('dokumentas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pivots', function (Blueprint $table) {
           $table->dropForeign('pivots_vjencanje_foreign');
           $table->dropForeign('pivots_dokument_foreign');
        });

        Schema::dropIfExists('pivots');
    }
}
