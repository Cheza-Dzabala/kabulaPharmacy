<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function ($table){
            $table->string('mobile');
            $table->string('id_number');
            $table->string('designation')->nullable();
            $table->string('image_path')->nullable();
            $table->date('employment_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function ($table){
            $table->dropColumn('mobile');
            $table->dropColumn('id_number');
            $table->dropColumn('designation')->nullable();
            $table->dropColumn('image_path')->nullable();
            $table->dropColumn('employment_date');
        });
    }
}
