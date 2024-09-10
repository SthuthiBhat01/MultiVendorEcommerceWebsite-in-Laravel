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
        Schema::table('companydetails', function (Blueprint $table) {
            $table->integer('status')->default(0)->after('pincode');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('companydetails', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
};
