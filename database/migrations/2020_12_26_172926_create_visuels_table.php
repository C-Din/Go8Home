<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visuels', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('typeVisuel');
            $table->string('urlVisuel');
            $table->unsignedTinyInteger('bien_id');
            $table->unsignedSmallInteger('etat')->default(1);
            $table->timestamps();
        });

        Schema::table('visuels', function(Blueprint $table){
            $table->foreign('bien_id')->references('id')
                                      ->on('biens')
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
        Schema::dropIfExists('visuels');
    }
}
