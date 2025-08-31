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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->json('name') ;
            $table->string('phone_code')->unique() ;
            $table->string('flag')->unique() ;
            $table->string('capital') ;
            $table->string('currency') ;
            $table->string('currency_name') ;
            $table->string('currency_symbol') ;
            $table->string('region') ;
            $table->string('subregion') ;
            $table->string('latitude') ;
            $table->string('longitude') ;
            $table->json('timezones') ;
            $table->boolean('status')->default(1) ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
