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
        Schema::create('tbl_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->string('customer', 145)->nullable();
            $table->string('estimate_id', 145)->nullable();
            $table->string('reference_id', 145)->nullable();
            $table->string('estimateDate', 145)->nullable();
            $table->string('sales_person', 145)->nullable();
            $table->string('project_name', 145)->nullable();
            $table->string('total_amount', 145)->nullable();
            $table->string('cgst', 145)->nullable();
            $table->string('sgst', 145)->nullable();
            $table->string('other_cost', 145)->nullable();
            $table->string('final_amount', 145)->nullable();
            $table->string('created_by', 145)->nullable();
            $table->string('updated_by', 145)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_invoice_details');
    }
};
