<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable()->unique();
            $table->string('domain')->unique()->comment('domain or subdomain name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_active')->default(1);
            $table->string('version')->nullable();
            $table->foreignId('plan_id')->nullable()->constrained('plans')->onDelete('cascade')->onUpdate('cascade');
            $table->json('data')->nullable()->comment('any additional tenant data');
            $table->string('creating_status')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
}
