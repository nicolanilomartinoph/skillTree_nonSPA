<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longtext('description');
            $table->json('parents')->nullable();
            $table->json('children')->nullable();
            //$table->binary('skill_image')->nullable();    Because MEDIUMBLOB is not supported
            
        });
        DB::statement("ALTER TABLE skills ADD image MEDIUMBLOB"); // Migrating MEDIUMBLOB
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
