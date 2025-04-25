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
            $table->string('brand')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('subcategory_id')->nullable()->constrained()->onDelete('cascade');  
            $table->decimal('price', 8, 2);
            $table->boolean('is_thrift_deal')->default(false);
            $table->boolean('is_new_arrival')->default(false);
            $table->longText('image')->nullable();
            $table->text('description')->nullable(); 
            $table->string('color')->nullable(); 
            $table->string('size')->nullable(); 
            $table->string('style')->nullable(); 
            $table->string('condition')->nullable(); 
            $table->string('material')->nullable(); 
            $table->boolean('is_sold')->default(false);
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
