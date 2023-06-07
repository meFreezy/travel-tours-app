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
        /**
         * The initial requirement stated that travels would contain information such as  the number of days, the images, title. This probably means we may need an 'image' column later on for local storage of our travel images.
         */
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_public');
            $table->string('slug');
            $table->string('name');
            $table->text('description');
            $table->unsignedInteger('number_of_days');
            $table->unsignedInteger('number_of_nights');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
