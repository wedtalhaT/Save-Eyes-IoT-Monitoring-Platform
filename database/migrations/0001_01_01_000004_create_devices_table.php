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
        Schema::create('devices', function (Blueprint $table) {
            $table->uuid('uuid')->primary();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->json('data')->nullable();
            $table->timestamp('last_seen_at')->nullable();

            $table->timestamps();
        });

        Schema::create('device_sensor', function (Blueprint $table) {
            $table->id();

            $table->uuid('device_id');
            $table->foreign('device_id')
                ->references('uuid')
                ->on('devices')
                ->cascadeOnDelete();

            $table->foreignId('sensor_id')
                ->constrained('sensors')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['device_id', 'sensor_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_sensor');
        Schema::dropIfExists('devices');
    }
};
