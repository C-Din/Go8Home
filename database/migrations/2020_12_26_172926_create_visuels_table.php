<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Bien;

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
            $table->foreignIdFor(Bien::class, 'bien_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('visuels');
    }
}
