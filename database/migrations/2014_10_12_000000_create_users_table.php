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
            $table->timestamp('email-verified-at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('roles')->nullable();
            $table->timestamps();
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('role-id');
            $table->unsignedBigInteger('user-id');

            $table->foreign('role-id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('user-id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['role-id', 'user-id']);
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
