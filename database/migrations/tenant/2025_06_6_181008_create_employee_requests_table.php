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
        Schema::create('employee_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->string('type'); // (e.g., Loan, Leave)
            $table->decimal('loan_amount', 10, 2)->nullable();
            $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete();
            $table->string('leave_type')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->time('time')->nullable();
            $table->text('reason')->nullable();
            $table->string('file_path')->nullable();
            $table->string('status'); // (Pending, Approved, Rejected)
            $table->string('manager_comment')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users', 'id')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_requests');
    }
};
