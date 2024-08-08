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
        Schema::table('suspect_fingerprint', function (Blueprint $table) {
            $table->unsignedBigInteger('criminal_id')->nullable()->after('suspect_id');
            $table->foreign('criminal_id')->references('id')->on('criminals')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('suspect_fingerprint', function (Blueprint $table) {
            //
        });
    }
};
