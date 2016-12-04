<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactionDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transactionStock', function (Blueprint $table){
            $table->increments('id');
            $table->string('transactionId');
            $table->string('stockId');
            $table->string('stockAmount');
            $table->string('purchaseMarkup');
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
        Schema::drop('transactionStock');
    }
}
