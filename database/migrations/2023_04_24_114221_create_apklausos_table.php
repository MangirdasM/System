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
        Schema::create('apklausos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uzsakymas_id');
            $table->foreign('uzsakymas_id')->references('id')->on('uzsakymas')->onDelete('cascade');
            $table->string('darbuotojas_id');
            $table->string('islaidos')->nullable();
            $table->string('kuras')->default('0');
            $table->string('virsvalandziai')->default('0');
            $table->longText('gedimai')->nullable();
            $table->longText('komentarai')->nullable();
            $table->boolean('filled')->default(false);
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
        Schema::dropIfExists('apklausos');
    }
};
