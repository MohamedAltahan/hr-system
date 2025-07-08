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
        Schema::create('salary_components', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('e.g., Basic Salary, Housing, Transportation');
            $table->string('slug')->nullable();
            $table->enum('type', ['allowance', 'deduction']);
            $table->boolean('is_basic_salary')->default(0)
                ->comment('Is this the basic salary component?');
            $table->boolean('is_taxable')->default(1)
                ->comment('Should this salary component be included when calculating tax?');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_components');
    }
};
