<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->unique('user_id');

            $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('role_id')
                    ->constrained()
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'role_id']);
            $table->dropIndex(['user_id', 'role_id']);
            $table->dropColumn(['user_id', 'role_id']);
        });
    }
}