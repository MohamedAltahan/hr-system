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
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('salary_structure_id')->constrained();

            $table->date('date');

            $table->decimal('basic_salary', 10, 2);
            $table->decimal('gross_salary', 10, 2)->default(0);
            $table->decimal('total_deductions', 10, 2)->default(0);
            $table->decimal('allowances', 10, 2)->default(0);
            $table->decimal('bonuses', 10, 2)->default(0);
            $table->decimal('net_salary', 10, 2)->default(0);
            $table->string('payment_method')->comment('e.g., Cash, Bank Transfer, Cheque');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslips');
    }
};
