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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('roles')->nullable();
            $table->timestamps();
        });

        /**
         * to use the laravel magic for many to many relationships, one must use the singular model, so we can't name it roles_users and it must be alphabetical,
         * hence why it was not named user_role. Foreign keys must also have underscores, not dashes
         */
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->constrained();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->constrained();

            $table->primary(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
