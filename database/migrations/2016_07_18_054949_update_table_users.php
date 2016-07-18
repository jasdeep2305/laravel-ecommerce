<?php

use Illuminate\Database\Migrations\Migration;

class UpdateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function ($table) {

            $table->integer('level_id')->unsigned()->nullable();
            $table->foreign('level_id')->references('id')->on('users_levels');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropForeign('level_id');
            $table->dropColumn('level_id');
        });
    }
}

