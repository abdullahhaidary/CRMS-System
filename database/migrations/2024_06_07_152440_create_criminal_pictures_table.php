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
        Schema::create('criminal_pictures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criminal_id');
            $table->string('picture_id')->nullable();
            $table->string('path');
            $table->timestamps();

            $table->foreign('criminal_id')->references('id')->on('criminals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('criminal_pictures');
    }
};
