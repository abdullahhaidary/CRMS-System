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
            $table->string('right_thumb')->nullable();
            $table->string('right_index')->nullable();
            $table->string('right_middle')->nullable();
            $table->string('right_ring')->nullable();
            $table->string('right_pinky')->nullable();
            $table->string('left_thumb')->nullable();
            $table->string('left_index')->nullable();
            $table->string('left_middle')->nullable();
            $table->string('left_ring')->nullable();
            $table->string('left_pinky')->nullable();
            $table->timestamps();

            $table->foreign('suspect_id')->references('id')->on('suspect')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suspect_fingerprint');
    }
};
