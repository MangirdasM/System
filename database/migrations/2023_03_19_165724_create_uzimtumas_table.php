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
        Schema::create('uzimtumas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('uzsakymas_id');
            $table->foreign('uzsakymas_id')->references('id')->on('uzsakymas')->onDelete('cascade');

            // And finally, the indexes (Better perfs when fetching data on that pivot table)
            $table->index(['user_id', 'uzsakymas_id'])->unique(); // This index has to be unique
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
        Schema::dropIfExists('uzimtumas');
    }
};
