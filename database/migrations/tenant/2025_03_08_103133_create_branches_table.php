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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->json('description')->nullable();
            $table->json('address')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->fullText(['name_en', 'name_ar']); // fulltext index
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
