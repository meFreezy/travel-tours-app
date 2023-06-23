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
        // travel is a noun without a plural form / same form is used, so the name of the table will be 'travel', not 'travels'
        // you can tinker str('travel')->plural() to double check
        Schema::create('travels', function (Blueprint $table) {
            $table->uuid(column: 'id')->primary();
            $table->boolean('is_public')->default(false);
            $table->string('slug')->unique();
            $table->string('name');
            $table->text('description');
            $table->unsignedInteger('number_of_days');
            $table->timestamps();
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
