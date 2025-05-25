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
            $table->string('name') ; 
            $table->string('slug')->unique() ; 
            $table->text('small_description') ; 
            $table->longText('description') ; 
            $table->string('sku') ; 
            $table->decimal('price' , 8 , 2) ; 
            $table->boolean('manage_stock')->default(0) ; 
            $table->integer('quantity')->nullable() ;
            $table->date('available_for')->nullable() ; 
            $table->decimal('discount' , 8 , 2)->nullable() ; 
            $table->decimal('discount_percentage' , 4, 2)->nullable() ;
            $table->date('discount_start_date')->nullable()  ; 
            $table->date('discount_end_date')->nullable()  ; 
            $table->boolean('available_in_stock')->default(1) ; 
            $table->enum('status', ['pending' , 'completed' , 'delivered' , 'cancelled'])->default('pending') ; 
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
