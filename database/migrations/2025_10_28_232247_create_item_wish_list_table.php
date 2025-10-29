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
        Schema::create('item_wish_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('wish_list_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->integer('quantity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_wish_list');
    }
};
