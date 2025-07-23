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
            $table->string('code', 10);
            $table->string('name', 150);
            $table->string('description', 200)->nullable();
            $table->foreignId('category_id')
                  ->constrained()
                  ->on('categories')
                  ->onDelete('restrict');
            $table->decimal('cost_price', 18,2);
            $table->decimal('sale_price', 18, 2);
            $table->integer('quantity_stock');
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
