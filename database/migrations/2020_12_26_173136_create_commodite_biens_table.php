<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommoditeBiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodite_biens', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('nombre');
            $table->unsignedSmallInteger('bien_id');
            $table->unsignedSmallInteger('commodite_id');
            $table->unsignedSmallInteger('etat')->default(1);
            $table->timestamps();
        });

        Schema::table('commodite_biens', function(Blueprint $table){
            $table->foreign('bien_id')->references('id')
                                      ->on('biens')
                                      ->onDelete('restrict')
                                      ->onUpdate('restrict');

            $table->foreign('commodite_id')->references('id')
                                      ->on('commodites')
                                      ->onDelete('restrict')
                                      ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commodite_biens');
    }
}
