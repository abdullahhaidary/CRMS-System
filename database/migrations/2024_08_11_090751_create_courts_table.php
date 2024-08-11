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
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criminal_id')->nullable();
            $table->string('ariza_before')->nullable(); // File path for the ariza when going to court
            $table->string('ariza_after')->nullable(); // File path for the ariza when returning
            $table->integer('final_mahkama')->default(0);
            $table->date('date_till_in_jail')->nullable();
            $table->foreign('criminal_id')->references('id')->on('criminals')->onDelete('cascade');
            $table->string('result')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts');
    }
};
