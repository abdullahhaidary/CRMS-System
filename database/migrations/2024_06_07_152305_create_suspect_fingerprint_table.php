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
            $table->unsignedBigInteger('suspect_id');
            $table->string('right_thumb');
            $table->string('right_index');
            $table->string('right_middle');
            $table->string('right_ring');
            $table->string('right_pinky');
            $table->string('left_thumb');
            $table->string('left_index');
            $table->string('left_middle');
            $table->string('left_ring');
            $table->string('left_pinky');
            $table->timestamps();

            $table->foreign('suspect_id')->references('id')->on('suspect')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suspect_fingerprint');
    }
};
