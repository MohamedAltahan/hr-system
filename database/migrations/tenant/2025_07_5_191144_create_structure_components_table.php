<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *this table stores the individual building blocks of an employee’s salary, such as:
     *Type	Examples
     *Allowances	Basic, Housing, Transportation, Bonus
     *Deductions	Tax, Social Insurance, Absence Penalty
     */
    public function up(): void
    {
        Schema::create('structure_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salary_structure_id')->constrained()->onDelete('cascade');
            $table->foreignId('salary_component_id')->constrained()->onDelete('cascade');
            $table->enum('value_type', ['fixed', 'percentage']);
            $table->decimal('value', 10, 2); // If percentage, it's % of basic
            $table->foreignId('base_component_id')->nullable(); // if percentage of another component like "Basic"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_components');
    }
};
