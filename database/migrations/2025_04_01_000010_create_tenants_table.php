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
            $table->json('company_name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('domain')->unique()->comment('domain or subdomain name');
            // $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('version')->nullable();
            $table->foreignId('plan_id')->nullable()->constrained('plans')->onDelete('cascade')->onUpdate('cascade');
            $table->json('data')->nullable()->comment('any additional tenant data');
            $table->string('creating_status')->nullable()->comment('0 failed, 1 created, 2 in progress, ');
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
