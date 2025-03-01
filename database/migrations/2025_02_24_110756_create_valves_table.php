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
        Schema::create('valves', function (Blueprint $table) {
            $table->string('valve_id')->primary();
            $table->timestamps();
            $table->string('location');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valves');
    }
};
