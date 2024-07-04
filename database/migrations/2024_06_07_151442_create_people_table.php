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
        Schema::create('people', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('email');
            $table->string('phone');
            $table->string('tazkira_number');
            $table->string('actual_address');
            $table->string('current_address');
            $table->string('crime_case');
            $table->string('ariza');
            $table->string('subject_crim');
            $table->string('crim_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('people');
    }
};
