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
        Schema::create('hiring_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opening_position_id')->constrained('opening_positions', 'id')->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('nationality')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('religion')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('current_salary')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('contract')->nullable();
            $table->integer('evaluations')->nullable();
            $table->string('status')->default('pending');
            $table->string('notes')->nullable();
            $table->text('cv')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiring_applications');
    }
};
