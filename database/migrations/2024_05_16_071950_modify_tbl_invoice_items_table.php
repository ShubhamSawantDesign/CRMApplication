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
        Schema::table('tbl_invoice_items', function (Blueprint $table) {
            $table->renameColumn('quantity', 'description');
            $table->renameColumn('cost', 'quantity');
            $table->renameColumn('total_Cost', 'unit_price');

            $table->string('sub_cost', 145)->nullable()->after('total_Cost');
            $table->string('gst_rate', 145)->nullable()->after('sub_cost');
            $table->string('gst_amount', 145)->nullable()->after('gst_rate');
            $table->string('total_amount', 145)->nullable()->after('gst_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_invoice_items', function (Blueprint $table) {
            $table->renameColumn('description', 'quantity');
            $table->renameColumn('quantity', 'cost');
            $table->renameColumn('unit_price', 'total_Cost');

            $table->dropColumn('sub_cost');
            $table->dropColumn('gst_rate');
            $table->dropColumn('gst_amount');
            $table->dropColumn('total_amount');
        });
    }
};
