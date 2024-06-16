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
        Schema::create('factor_items', function (Blueprint $table) {
            $table->id('factor_item_id');
            $table->unsignedBigInteger('factor_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('step_id');
            $table->string('date' , 250);
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factor_items');
    }
};
