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

            $table->foreignId('tenant_id')->nullable();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');

            $table->boolean('is_deletable')->default(1);

            $table->json('description')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('price_after_discount', 10, 2)->nullable();
            $table->json('currency')->nullable()->comment('"ar" => "ريال سعودي", "en" => "SAR"');
            $table->boolean('is_active')->default(1);
            $table->integer('order')->default(1)->nullable();
            $table->boolean('is_popular')->default(0);
            $table->json('features')->nullable()->comment('e.g., [Feature 1, Feature 2] preview on plan card on webiste');
            $table->boolean('is_trial')->default(1);
            $table->integer('trial_days')->default(0)->comment('Number of days for free trial ex : 14 days');
            $table->unsignedTinyInteger('duration_in_months')->default(1)->comment('How many months this plan lasts');
            $table->json('limits')->nullable()->comment('Store limits for each module ex: {"max_users": 10 , "max_branches": 5, ....}');
            $table->json('permissions')->nullable()->comment('Array of permission names');
            $table->json('sidebar_items')->nullable()->comment('Array of sidebar items for this plan');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
