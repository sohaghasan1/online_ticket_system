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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->timestamp('departure_at');
            $table->foreignId('departure_location_id')->constrained('locations')->references('id');
            $table->foreignId('apertaure_location_id')->constrained('locations')->references('id');
            $table->foreignId('bus_id')->constrained();
            $table->decimal('fare', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
