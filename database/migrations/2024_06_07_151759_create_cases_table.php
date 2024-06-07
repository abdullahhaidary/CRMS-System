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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crime_record_id');
            $table->string('case_number');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->string('crime_type');
            $table->string('crime_location');
            $table->timestamps();

            $table->foreign('crime_record_id')->references('id')->on('crime_register_record_information')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cases');
    }
};
