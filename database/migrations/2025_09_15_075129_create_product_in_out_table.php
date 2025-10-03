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
        Schema::create('product_in_out', function (Blueprint $table) {
            $table->id();
            $table->boolean('in_out')->comment('in:1 , out:0');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('branch_id');
            $table->integer('quantity')->default(0);
            $table->unsignedBigInteger('event')->comment('3 for sales, 1 for restock, 2 for stockout');
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**xhamal
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_in_out');
    }
};
