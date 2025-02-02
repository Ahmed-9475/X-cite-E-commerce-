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
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('cookie_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('set null');
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->unsignedMediumInteger('quantity')->default(1);
            $table->json('option')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
