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
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('salary_structure_id')->constrained();
            $table->string('payment_method')->comment('e.g., Cash, Bank Transfer, Cheque');
            $table->string('pay_type')->comment('e.g., Monthly, Yearly, daily');
            $table->decimal('basic_salary', 10, 2); // base value
            $table->date('start_date');
            $table->date('end_date')->nullable()->comment('if null, it means it is current salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salaries');
    }
};
