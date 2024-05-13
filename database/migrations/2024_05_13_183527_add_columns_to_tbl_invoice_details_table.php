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
            $table->string('subject', 145)->nullable()->after('project_name');
            $table->string('customer_note', 45)->nullable()->after('subject');
            $table->string('tnc', 45)->nullable()->after('customer_note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_invoice_details', function (Blueprint $table) {
            $table->dropColumn('subject');
            $table->dropColumn('customer_note');
            $table->dropColumn('tnc');
        });
    }
};
