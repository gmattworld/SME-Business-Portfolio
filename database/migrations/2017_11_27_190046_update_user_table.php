<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table)
        {
            $table->boolean('isActive');
            $table->integer('created_by');
            $table->string('profile_pics');
            $table->integer('department_id');
            $table->integer('designation_id');
            $table->integer('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table)
        {
            $table->dropColumn('isActive');
            $table->dropColumn('created_by');
            $table->dropColumn('profile_pics');
            $table->dropColumn('department_id');
            $table->dropColumn('designation_id');
            $table->dropColumn('role_id');
        });
    }
}
