<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subjects', function (Blueprint $table) {
            $table->primary(['user_id', 'subject_id']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subject_id');
            //$table->timestamps('started', 0);
            //$table->timestamps('completed', 0);
            /**
             * I dont know why TIMESTAMPS causes MySQL error when migrating but removing it for now, 
             * uncomment it soon as subject needs these data
             */

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_subjects');
    }
}
