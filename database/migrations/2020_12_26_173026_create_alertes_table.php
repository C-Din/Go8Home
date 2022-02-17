<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertes', function (Blueprint $table) {
            $table->id();
            $table->unsignedDouble('montantMin');
            $table->unsignedDouble('montantMax');
            $table->unsignedSmallInteger('client_id');
            $table->unsignedSmallInteger('lieu_id');
            $table->unsignedSmallInteger('type_bien_id');
            $table->unsignedSmallInteger('etat')->default(1);
            $table->timestamps();
        });

        Schema::table('alertes', function(Blueprint $table){
            $table->foreign('type_bien_id')->references('id')
                                      ->on('type_biens')
                                      ->onDelete('restrict')
                                      ->onUpdate('restrict');

            $table->foreign('lieu_id')->references('id')
                                      ->on('lieus')
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
        Schema::dropIfExists('alertes');
    }
}
