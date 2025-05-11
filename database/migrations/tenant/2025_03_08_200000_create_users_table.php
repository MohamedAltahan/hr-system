<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Common\Enums\UserRoleEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->foreignId('branch_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->date('birthday')->nullable();
            $table->string('national_id')->unique()->nullable();
            $table->string('employee_number')->unique()->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('social_status', ['single', 'married'])->nullable();
            $table->date('hire_date')->nullable();
            $table->foreignId('direct_manager_id')->nullable();
            $table->foreign('direct_manager_id')->references('id')->on('users');
            $table->foreignId('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreignId('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->string('job_title')->nullable();
            $table->string('role')->default(UserRoleEnum::EMPLOYEE);
            $table->json('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->boolean('is_active')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
