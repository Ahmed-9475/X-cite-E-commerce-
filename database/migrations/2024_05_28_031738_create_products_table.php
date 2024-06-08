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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->float('price');
            $table->float('compare_price');
            $table->string('rating')->default(1);
            $table->json('option')->nullable();
            $table->boolean('featured')->default(0);
            $table->enum('status',['active','pending','notActive'])->default('active');
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
