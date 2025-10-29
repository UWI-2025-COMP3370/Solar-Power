<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
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
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->unique(['wish_list_id', 'item_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_wish_list');
    }
};

};
