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
        Schema::create('tbl_buying', function (Blueprint $table) {
            $table->id('bid');
            $table->foreignId('cid_fk')->constrained('tbl_customer', 'cid')->onUpdate('cascade');
            $table->foreignId('pid_fk')->constrained('tbl_product', 'pid')->onUpdate('cascade');
            $table->integer('bought_qty');
            $table->float('bought_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_buying');
    }
};
