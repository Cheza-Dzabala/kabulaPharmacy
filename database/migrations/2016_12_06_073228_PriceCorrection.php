<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PriceCorrection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('stockDetails', function ($table){
            $table->dropColumn('markup');
        });

        Schema::table('stock', function ($table){
            $table->integer('price');
        });


        Schema::table('transactionStock', function ($table){
            $table->dropColumn('purchaseMarkup');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('stockDetails', function ($table){
            $table->integer('markup');
        });
        Schema::table('stock', function ($table){
            $table->dropColumn('price');
        });


        Schema::table('transactionStock', function ($table){
            $table->integer('purchaseMarkup');
            $table->dropColumn('price');
        });

    }
}
