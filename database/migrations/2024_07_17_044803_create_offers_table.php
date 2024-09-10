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
        Schema::create('offers', function (Blueprint $table) {
            $table->id('offerid'); // Primary key renamed to offerid
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key referencing the products table
            $table->string('offer_name');
            $table->decimal('discount_percentage', 5, 2);
            $table->decimal('discounted_price', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
