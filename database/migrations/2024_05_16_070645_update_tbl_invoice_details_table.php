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
        Schema::table('tbl_invoice_details', function (Blueprint $table) {
            $table->dropColumn(['final_amount', 'other_cost']);
            $table->renameColumn('total_amount', 'sub_total_amount');
            $table->renameColumn('cgst', 'total_gst_amount');
            $table->renameColumn('sgst', 'final_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_invoice_details', function (Blueprint $table) {
            $table->string('final_amount', 145)->nullable()->default(null);
            $table->string('other_cost', 145)->nullable()->default(null);

            $table->renameColumn('sub_total_amount', 'total_amount');
            $table->renameColumn('total_gst_amount', 'cgst');
            $table->renameColumn('final_amount', 'sgst');
        });
    }
};
