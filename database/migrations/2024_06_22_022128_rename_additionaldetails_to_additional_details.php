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
        Schema::rename('additionaldetails', 'additional_details');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::rename('additional_details', 'additionaldetails');
    }
};
