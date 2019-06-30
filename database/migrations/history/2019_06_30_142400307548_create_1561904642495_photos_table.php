<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1561904642495PhotosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('photos')) {
            Schema::create('photos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->unsignedInteger('created_by_id')->nullable();
                $table->foreign('created_by_id', 'created_by_fk_146357')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
