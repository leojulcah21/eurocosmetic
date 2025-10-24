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
        Schema::create('collectors', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete()->unique();
            $table->string('driver_license', 50)->nullable();
            $table->string('license_code', 50)->nullable();
            $table->string('education', 100)->default('High school diploma');
            $table->integer('years_experience')->default(0);
            $table->integer('age')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collectors');
    }
};
