<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoris', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('bien_id');
            $table->unsignedTinyInteger('client_id');
            $table->unsignedSmallInteger('etat')->default(1);
            $table->timestamps();
        });

        Schema::table('favoris', function(Blueprint $table){
            $table->foreign('bien_id')->references('id')
                                      ->on('biens')
                                      ->onDelete('restrict')
                                      ->onUpdate('restrict');

            $table->foreign('client_id')->references('id')
                                      ->on('clients')
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
        Schema::dropIfExists('favoris');
    }
}
