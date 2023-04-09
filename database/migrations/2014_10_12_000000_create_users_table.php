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
            $table->string('vardas')->default('');
            $table->string('pavarde')->default('');
            $table->string('Epastas')->nullable()->unique();
            $table->string('password');
            $table->string('prisijungimoVardas')->unique();
            $table->string('pareigos')->default('');
            $table->string('telefonas')->default('');
            $table->boolean('filled')->default(false);
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
