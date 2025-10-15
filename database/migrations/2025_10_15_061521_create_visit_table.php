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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('technician_name');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->float('roof_size');
            $table->enum('roof_type', ['flat', 'shed', 'gable', 'hip', 'dutch', 'mansard']);
            $table->float('monthly_consumption_kwh');
            $table->string('material');
            $table->string('condition');
            $table->integer('stories');
            $table->boolean('shaded');
            $table->string('material');
            $table->string('condition');
            $table->int('stories');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
