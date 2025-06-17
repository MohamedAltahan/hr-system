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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->foreignId('branch_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->nullable();
            $table->integer('required_employees')->nullable();
            $table->string('type')->nullable();
            $table->string('website')->nullable();
            $table->date('job_posted_date')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_published')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
