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
        Schema::create('tbl_devices', function (Blueprint $table) {
            $table->id('device_id');
            $table->unsignedBigInteger('user_id');
            $table->string('device_name', 100);
            $table->string('serial_number', 100)->unique();
            $table->string('location_description', 255)->nullable();
            $table->date('install_date');
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active');
            $table->foreign('user_id')->references('user_id')->on('tbl_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tbl_devices');
    }
};
