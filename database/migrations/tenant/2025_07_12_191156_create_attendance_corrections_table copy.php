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
        Schema::create('payslip_components', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payslip_id')->constrained()->onDelete('cascade');
            $table->foreignId('salary_component_id')->constrained()->onDelete('cascade');

            $table->decimal('amount', 10, 2); // positive or negative

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslip_components');
    }
};
