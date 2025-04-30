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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');    // Foreign key to orders table


            // Separate ratings for Product Quality, Seller Service, and Delivery Service
            $table->integer('product_quality_rating')->nullable(); // Rating from 1 to 5
            $table->integer('seller_service_rating')->nullable();  // Rating from 1 to 5
            $table->integer('delivery_service_rating')->nullable(); // Rating from 1 to 5

        
            $table->text('comment')->nullable();       // Optional comment
            $table->boolean('show_username')->default(false); // NEW: save checkbox value
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
