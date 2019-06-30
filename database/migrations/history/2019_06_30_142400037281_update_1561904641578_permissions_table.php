<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1561904641578PermissionsTable extends Migration
{
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('title')->nullable();
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
        });
    }
}
