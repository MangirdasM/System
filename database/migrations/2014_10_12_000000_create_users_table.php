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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('vardas')->nullable();
            $table->string('pavarde')->nullable();
            $table->string('Epastas')->unique();
            $table->string('slaptazodis');
            $table->string('prisijungimoVardas');
            $table->string('Pareigos')->nullable();
            $table->string('telefonas')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
