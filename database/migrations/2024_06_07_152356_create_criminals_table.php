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
        Schema::create('criminals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suspect_id')->nullable();
            $table->unsignedBigInteger('case_id');
            $table->string('criminal_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('current_address')->nullable();
            $table->string('actual_address')->nullable();
            $table->date('arrest_date');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('job');
            $table->string('marital_status');
            $table->string('family_members');
            $table->string('photo');
            $table->string('Created_by');
            $table->timestamps();

            $table->foreign('suspect_id')->references('id')->on('suspect')->onDelete('cascade');
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('criminals');
    }
};
