<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('name');        // customer name
        $table->string('phone');       // phone number
        $table->decimal('subtotal', 10, 2)->default(0);
        $table->decimal('tax', 10, 2)->default(0);
        $table->decimal('total', 10, 2)->default(0);
        $table->string('status')->default('pending');
        $table->timestamp('delivered_on')->nullable();
        $table->integer('items_count')->default(0);
        $table->timestamps();
    });
}
    
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};