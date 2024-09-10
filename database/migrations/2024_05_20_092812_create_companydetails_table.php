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
        Schema::create('companydetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->string('company_name');
            $table->string('gstin')->unique();
            $table->string('website_link')->nullable();
            $table->text('address');
            $table->string('country');
            $table->string('city');
            $table->string('region');
            $table->string('pincode');
            $table->timestamps();

            // Adding foreign key constraint
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companydetails');
    }
};
