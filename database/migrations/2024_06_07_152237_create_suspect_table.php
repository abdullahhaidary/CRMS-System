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
        Schema::create('suspect', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crime_record_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('actual_address');
            $table->string('current_address');
            $table->string('father_name');
            $table->timestamps();

            $table->foreign('crime_record_id')->references('id')->on('cases')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suspect');
    }
};
