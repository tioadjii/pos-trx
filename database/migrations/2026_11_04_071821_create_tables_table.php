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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('table_number', 10)->unique(); // Contoh: "01", "02"
            $table->string('qr_token', 64)->unique();     // Token unik untuk QR Code
            $table->enum('status', ['available', 'occupied'])->default('available');
            $table->timestampsTz(); // Gunakan Tz (Timezone) untuk PostgreSQL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
