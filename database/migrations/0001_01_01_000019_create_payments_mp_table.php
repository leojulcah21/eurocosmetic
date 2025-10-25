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
        Schema::create('payments_mp', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->foreignId('order_id')->unique()->constrained('orders')->cascadeOnDelete();
            $table->string('mp_transaction_id', 100)->unique();
            $table->decimal('amount', 12, 2);
            $table->timestamp('payment_date')->useCurrent();
            $table->enum('payment_status', ['approved', 'pending', 'rejected', 'cancelled']);
            $table->string('payment_method', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_mp');
    }
};
