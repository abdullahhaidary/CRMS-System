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
            $table->unsignedBigInteger('crime_record_id')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('tazcira_number')->nullable();
            $table->string('actual_address')->nullable();
            $table->string('current_address')->nullable();
            $table->string('father_name')->nullable();
            $table->integer('isCriminal');
            $table->string('Created_by');
            $table->timestamps();

            $table->foreign('crime_record_id')->references('id')->on('crime_register_record_information')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suspect');
    }
};
