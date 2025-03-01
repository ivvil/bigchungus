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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->boolean('enabled')->default(false);
            $table->dateTimeTz('start');
            $table->dateTimeTz('end');

            $table->string('schedulable_type');
            $table->string('schedulable_id');

            $table->timestamps();
            $table->softDeletes();

            $table->index(['schedulable_type', 'schedulable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
