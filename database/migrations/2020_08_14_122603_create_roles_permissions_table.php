<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->foreignId('role_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('permission_id')
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
        Schema::dropIfExists('roles_permissions',  function (Blueprint $table) {
            $table->dropForeign(['role_id', 'permission_id']);
            $table->dropIndex(['role_id', 'permission_id']);
            $table->dropColumn(['role_id', 'permission_id']);
        });
    }
}
