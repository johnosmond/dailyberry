<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('current_specials', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores');

            $table->string('concrete');
            $table->string('food');
            $table->text('food_description');
            $table->string('soup_1');
            $table->string('soup_1_description');
            $table->string('soup_2');
            $table->string('soup_2_description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_specials');
    }
};
