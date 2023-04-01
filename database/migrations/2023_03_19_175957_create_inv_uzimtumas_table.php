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
        Schema::create('inv_uzimtumas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventoriaus_id');
            $table->foreign('inventoriaus_id')->references('id')->on('inventoriuses')->onDelete('cascade');

            $table->unsignedBigInteger('uzsakymo_id');
            $table->foreign('uzsakymo_id')->references('id')->on('uzsakymas')->onDelete('cascade');

            // And finally, the indexes (Better perfs when fetching data on that pivot table)
            $table->index(['inventoriaus_id', 'uzsakymo_id'])->unique(); // This index has to be unique
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
        Schema::dropIfExists('inv_uzimtumas');
    }
};
