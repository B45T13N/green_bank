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
        Schema::table('vehicle_types', function (Blueprint $table)
        {
            $table->bigInteger('notation_id')->unsigned();

            $table->foreign('notation_id')->references('id')->on('gradings');
        });

        Schema::table('energies', function (Blueprint $table)
        {
            $table->bigInteger('notation_id')->unsigned();

            $table->foreign('notation_id')->references('id')->on('gradings');
        });

        Schema::table('mileages', function (Blueprint $table)
        {
            $table->bigInteger('notation_id')->unsigned();

            $table->foreign('notation_id')->references('id')->on('gradings');
        });

        Schema::table('years', function (Blueprint $table)
        {
            $table->bigInteger('notation_id')->unsigned();

            $table->foreign('notation_id')->references('id')->on('gradings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicle_types', function (Blueprint $table) {
            $table->dropForeign(['notation_id']);
            $table->dropColumn('notation_id');
        });

        Schema::table('energies', function (Blueprint $table) {
            $table->dropForeign(['notation_id']);
            $table->dropColumn('notation_id');
        });

        Schema::table('mileages', function (Blueprint $table) {
            $table->dropForeign(['notation_id']);
            $table->dropColumn('notation_id');
        });

        Schema::table('years', function (Blueprint $table) {
            $table->dropForeign(['notation_id']);
            $table->dropColumn('notation_id');
        });
    }
};
