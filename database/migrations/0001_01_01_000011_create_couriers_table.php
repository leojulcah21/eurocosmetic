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
            Schema::create('couriers', function (Blueprint $table) {
                $table->id();
                $table->string('code', 20)->unique();
                $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete()->unique();
                $table->string('driver_license', 50)->nullable();
                $table->string('license_code', 50)->nullable();
                $table->enum('vehicle_type', ['motorcycle', 'bicycle', 'car', 'on_foot'])->default('motorcycle');
                $table->integer('capacity')->nullable();
                $table->string('vehicle_plate', 20)->nullable();
                $table->enum('availability_status', ['available', 'on_route', 'inactive'])->default('available');
                $table->decimal('rating', 3, 2)->default(5.00);
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
