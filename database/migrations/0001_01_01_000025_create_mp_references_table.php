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
        Schema::create('mp_references', function (Blueprint $table) {
            $table->id();
            $table->string('external_reference')->unique();
            $table->unsignedBigInteger('user_id');
            $table->json('cart'); // lo que quieras guardar
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mp_references');
    }
};
