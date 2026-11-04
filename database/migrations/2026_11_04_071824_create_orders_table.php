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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code', 20)->unique(); // Contoh: "TRX-20231025-0001"
            $table->foreignId('table_id')->nullable()->constrained('tables');
            $table->foreignId('user_id')->nullable()->constrained('users'); // Kasir yang memproses (jika ada)
            $table->enum('status', [
                'pending', 'confirmed', 'preparing',
                'served', 'paid', 'cancelled'
            ])->default('pending');
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('tax', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);
            $table->jsonb('metadata')->nullable(); // Fitur khas Postgres untuk data fleksibel
            $table->timestampTz('paid_at')->nullable();
            $table->timestampsTz();
            
            $table->index(['status', 'created_at']); // Index agar dashboard admin cepat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
