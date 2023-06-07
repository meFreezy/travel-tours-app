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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('travel-id');
            $table->date('start-date')->nullable();
            $table->date('end-date')->nullable();
            $table->unsignedBigInteger('price');
            $table->timestamps();

            $table->foreign('travel-id')->references('id')->on('travels')->nullableOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
