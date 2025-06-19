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
        Schema::create('opening_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->constrained()->cascadeOnDelete();
            $table->string('email')->nullable();
            $table->integer('number_of_vacancies')->nullable();
            $table->string('type')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->boolean('is_published')->default(0);
            $table->foreignId('department_id')->constrained('departments', 'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_positions');
    }
};
