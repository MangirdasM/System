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
        Schema::create('uzsakymas', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->date('data');
            $table->string('vieta');
            $table->longText('papildoma');
            $table->string('kontaktinisasmuo');
            $table->string('sventestipas');
            $table->string('kontaktinisnumeris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uzsakymas');
    }
};
