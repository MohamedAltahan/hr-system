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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->json('name')->comment('e.g., Basic, Pro');
            $table->json('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('price_after_discount', 10, 2)->nullable();
            $table->string('interval')->comment('monthly, yearly');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_popular')->default(0);

            $table->json('features')->nullable()->comment('e.g., [Feature 1, Feature 2] preview on plan card on webiste');
            $table->json('limits')->nullable()->comment('Store limits for each module ex: {"max_users": 10 , "max_branches": 5, ....}');
            $table->json('permissions')->nullable()->comment('Array of permission names');
            $table->json('sidebar_items')->nullable()->comment('Array of sidebar items for this plan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
