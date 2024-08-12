<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('suspect_fingerprint', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suspect_id')->nullable();
            $table->unsignedBigInteger('criminal_id')->nullable();
            $table->longText('right_thumb')->nullable();
            $table->longText('right_index')->nullable();
            $table->longText('right_middle')->nullable();
            $table->longText('right_ring')->nullable();
            $table->longText('right_pinky')->nullable();
            $table->longText('left_thumb')->nullable();
            $table->longText('left_index')->nullable();
            $table->longText('left_middle')->nullable();
            $table->longText('left_ring')->nullable();
            $table->longText('left_pinky')->nullable();
            $table->timestamps();

            $table->foreign('suspect_id')->references('id')->on('suspect')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('suspect_fingerprint');
    }
};
