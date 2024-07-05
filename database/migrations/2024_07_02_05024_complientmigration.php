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
        Schema::create('complients', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('com_name');
            $table->string('lname');
            $table->string('com_father_name');
            $table->string('number_of_tazkira');
            $table->string('phone');
            $table->string('address');
            $table->string('complient_subject');
            $table->string('email');
            $table->string('complinet_reson');
            $table->string('complinet_date');
            $table->string('arza_file');
            $table->string('complinet_description');
            $table->string('name_criminal');
            $table->string('lname_criminal');
            $table->string('address_criminal');
            $table->string('phone_criminal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
