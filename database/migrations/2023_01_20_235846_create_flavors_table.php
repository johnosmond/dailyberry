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
        Schema::create('flavors', function (Blueprint $table) {
            
            $table->id();

            $table->string('flavor');
            $table->string('description')->nullable();
            $table->integer('times_used')->default(0);

            $table->timestamps();
            $table->softDeletes();
            
            $table->index('flavor');
            $table->index('times_used');
            $table->index(['flavor', 'times_used'], 'sorting_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flavors');
    }
};
