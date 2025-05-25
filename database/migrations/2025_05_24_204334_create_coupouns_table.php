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
        Schema::create('coupouns', function (Blueprint $table) {
            $table->id();
            $table->string('code') ; 
            $table->decimal('discount' , 8 , 2)->nullable() ; 
            $table->decimal('dicount_percentage' , 4,2)->nullable() ;
            $table->date('discount_start_date') ; 
            $table->date('discount_end_date') ; 
            $table->integer('limit') ; 
            $table->integer('used_times') ; 
            $table->boolean('is_available')->default(1) ; 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupouns');
    }
};
