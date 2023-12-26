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
        Schema::table('seat_allocations', function (Blueprint $table) {
            $table->decimal('amount', 10,2)->after('seat_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seat_allocations', function (Blueprint $table) {
            $table->dropColumn('amount', 10,2);
        });
    }
};
