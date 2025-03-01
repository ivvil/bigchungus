<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'app';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('valve_zone', function (Blueprint $table) {
            $table->string('valve_id');
            $table->unsignedBigInteger('zone_id');

            $table->foreign('valve_id')
                ->references('valve_id')
                ->on('zones')
                ->cascadeOnDelete();

            $table->foreign('zone_id')
                ->references('id')
                ->on('zones')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valve_zone_pivot');
    }
};
