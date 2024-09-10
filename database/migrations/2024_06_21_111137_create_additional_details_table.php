<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('additionaldetails', function (Blueprint $table) {
            $table->id();
            $table->text('supported_by');
            $table->text('privacy_policy');
            $table->text('code_of_conduct');
            $table->text('general_terms');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('additionaldetails');
    }
};
