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
         * to use the laravel magic for many to many relationships, one must use the singular model, so we can't name it roles_users and it must be alphabetical,
         * hence why it was not named user_role. Foreign keys must also have underscores, not dashes
         */
        Schema::create('role_user', function (Blueprint $table) {
            // constrained is a shorter way for 'references this column on this table'
            // if the table name is not standard, then  it must be provided as a parameter in the 'constrained' method.
            $table->foreignUuid('role_id')->constrained();
            $table->foreignUuid('user_id')->constrained();

            $table->primary(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('roles');
    }
};
