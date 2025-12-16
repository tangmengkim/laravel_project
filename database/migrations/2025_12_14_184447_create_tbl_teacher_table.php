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
        Schema::create('tbl_teacher', function (Blueprint $table) {
            $table->id('tid');
            $table->string('full_name', 512);
            $table->string('gender', 16);
            $table->string('degree', 256);
            $table->string('tel', 32);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_teacher');
    }
};
