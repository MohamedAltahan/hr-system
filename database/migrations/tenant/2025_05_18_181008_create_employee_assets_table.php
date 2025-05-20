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
        Schema::create('employee_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('manager_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('employee_asset_type_id')->constrained('employee_asset_types', 'id')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained('departments', 'id')->cascadeOnDelete();
            $table->date('issue_date');
            $table->date('return_date')->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_assets');
    }
};
