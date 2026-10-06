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
        Schema::create('device_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sensor_id')
                ->constrained('sensors')
                ->cascadeOnDelete();

            $table->string('key');
            $table->string('label');
            $table->string('unit')->nullable();

            $table->timestamps();

            $table->unique(['sensor_id', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_requests');
    }
};
