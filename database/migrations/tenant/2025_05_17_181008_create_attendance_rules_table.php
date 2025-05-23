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
        Schema::create('attendance_rules', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->time('entry_time');
            $table->time('exit_time');
            $table->int('grace_period_minutes')->default(0);
            $table->time('break_time')->nullable();
            $table->string('shift_time')->default('morning');
            $table->string('work_type')->default('full-time');
            $table->integer('weekly_days_count')->default(5);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_rules');
    }
};
