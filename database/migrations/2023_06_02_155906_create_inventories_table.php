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
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('itemID');
            $table->string('productcode');
            $table->string('product_name');
            $table->string('product_category');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();
            $table->double('amount');
            $table->string('stock');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
