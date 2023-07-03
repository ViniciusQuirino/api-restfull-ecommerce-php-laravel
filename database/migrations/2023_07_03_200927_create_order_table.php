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
        Schema::create('order', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            
            $table->string('status', 30);
            $table->string('name', 100);
            $table->decimal('value', 10, 2);
            $table->integer('amount');
            $table->integer('stock');
            $table->string('category', 40);

            $table->uuid('seller_id');
            $table->foreign('seller_id')->references('id')->on('users');

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->uuid('address_id');
            $table->foreign('address_id')->references('id')->on('address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
