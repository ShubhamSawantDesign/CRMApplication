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
        Schema::create('tbl_authentication', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('login_username', 250);
            $table->string('username', 250);
            $table->string('email', 250);
            $table->string('password', 250);
            $table->enum('is_first_login', ['true', 'false'])->default('true')->nullable();
            $table->integer('login_attempts')->nullable();
            $table->string('fail_login_time', 250)->nullable();
            $table->enum('status', ['active', 'inactive', 'delete'])->default('active');
            $table->string('rights', 145)->nullable();
            $table->datetime('expired_at')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_authentication');
    }
};
