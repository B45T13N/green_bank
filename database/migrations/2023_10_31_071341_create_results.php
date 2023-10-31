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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type')->nullable(false);
            $table->string('energy')->nullable(false);
            $table->string('mileage')->nullable(false);
            $table->string('year')->nullable(false);
            $table->string('passenger')->nullable(false);
            $table->float('bonus')->nullable(false);
            $table->float('final_grading')->nullable(false);
            $table->float('final_borrowing_rate')->nullable(false);
            $table->float('borrowing_rate')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
