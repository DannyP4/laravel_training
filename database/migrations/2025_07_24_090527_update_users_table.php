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
        // update the users table on request
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin');
            $table->boolean('is_active');
            $table->string('username');
            $table->string('first_name');
            $table->dropColumn('name');
            $table->string('last_name');
        });
    } /* use 'php artisan make:migration update_users_table --table=users' to create this migration file
       * and then run 'php artisan migrate' to apply the changes to the database.
    */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // rollback the changes made to the users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'is_active', 'username', 'first_name', 'last_name']);
            $table->string('name');
        });
    } // use 'php artisan migrate:rollback' to revert the changes made by this migration
};
