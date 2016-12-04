<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Suppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('suppliers', function (Blueprint $table){

            $table->increments('id');
            $table->string('supplierName')->unique();
            $table->string('address');
            $table->string('primaryContactPerson');
            $table->string('primaryPhonenumber');
            $table->string('primaryEmail')->nullable();
            $table->string('secondaryPhonenumber')->nullable();
            $table->string('secondaryEmail')->nullable();
            $table->string('city');
            $table->timestamps();

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
        Schema::drop('suppliers');
    }
}
