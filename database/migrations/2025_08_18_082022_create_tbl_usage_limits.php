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
        //
        Schema::create('tbl_usage_limits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('period_type', ['daily', 'weekly', 'monthly']);
            $table->decimal('max_consumption', 12, 2);
            $table->timestamp('created_at')->useCurrent(); // 👈 keep only this
            $table->foreign('id')->references('id')->on('tbl_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tbl_usage_limits');
    }
};
