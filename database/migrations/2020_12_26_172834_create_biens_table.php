<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('nombreChambre');
            $table->unsignedDouble('superficie');
            $table->unsignedDouble('montant');
            $table->unsignedSmallInteger('etage')->nullable();
            $table->unsignedSmallInteger('nombreEtage')->nullable();
            $table->unsignedSmallInteger('typeAchat');
            $table->text('description');
            $table->text('image');
            $table->unsignedBigInteger('type_bien_id');
            $table->unsignedBigInteger('lieu_id');
            $table->unsignedSmallInteger('etat')->default(1);
            $table->timestamps();
        });

        Schema::table('biens', function(Blueprint $table){
            $table->foreign('lieu_id')->references('id')
                                      ->on('lieus')
                                      ->onDelete('restrict')
                                      ->onUpdate('restrict');
            $table->foreign('type_bien_id')->references('id')
                                      ->on('type_biens')
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
        Schema::dropIfExists('biens');
    }
}
