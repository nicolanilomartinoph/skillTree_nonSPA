<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompletionChildParentCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            //
            /** 
             * aggregate_subject - is a subject itself but is a combination of multiple subject_id
             */
            $table->decimal('subject_completion')->default(0.00);
            $table->unsignedBigInteger('parents')->nullable();
            $table->json('parent_requirement')->nullable();
            $table->json('children')->nullable();
            $table->json('aggregate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            //
        });
    }
}
