<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lieus', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('ville');
            $table->string('quartier');
            $table->unsignedInteger('bp')->nullable();
            $table->unsignedSmallInteger('etat')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lieus');
    }
}
