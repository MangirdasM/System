<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventoriuses', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('pavadinimas');
            $table->string('kiekis');
            $table->string('tipas');
            $table->string('komentarai');
            $table->string('kodas');
            $table->string('nuotrauka')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventorius');
    }
};
