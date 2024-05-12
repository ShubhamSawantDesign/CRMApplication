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
        Schema::create('tbl_invoice_items', function (Blueprint $table) {
            $table->id('items_id');
            $table->string('invoice_id', 145)->nullable();
            $table->string('item', 145)->nullable();
            $table->string('quantity', 145)->nullable();
            $table->string('cost', 145)->nullable();
            $table->string('total_Cost', 145)->nullable();
            $table->timestamps();
            $table->string('created_by', 145)->nullable();
            $table->string('updated_by', 145)->nullable();
        });
    }

    /**
     * Reverse the migrations. 
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_invoice_items');
    }
};
