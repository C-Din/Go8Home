<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('etat')->default(1);
            $table->timestamps();
        });

        Schema::table('admins', function(Blueprint $table){
            $table->foreign('user_id')->references('id')
                                      ->on('users')
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
        Schema::dropIfExists('admins');
    }
}
