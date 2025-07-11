<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 1-create structure
     * 2-create components
     * 3- link components to structure
     */
    public function up(): void
    {

        Schema::create('salary_structures', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('e.g., Employee, Manager');
            $table->integer('working_days')->default(20);
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_structures');
    }
};
