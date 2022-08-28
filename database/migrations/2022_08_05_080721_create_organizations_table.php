<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('structure_id')->nullable();
            $table->integer('thumbnail_id');
            $table->integer('album_id')->nullable();
            $table->integer('coach_id')->nullable();
            $table->integer('head_id')->nullable();
            $table->string('name');
            $table->text('schedule')->nullable();
            $table->text('description');
            $table->string('status');
            $table->boolean('is_active');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
