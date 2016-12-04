<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('orders', function ($table){
           $table->dropColumn('orderAmount');
           $table->boolean('isActive');
            $table->boolean('order_placed');
        });

        Schema::create('orderDetails', function (Blueprint $table){
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('stock_item')->nullable();
            $table->integer('product_item')->nullable();
            $table->integer('quantity');
            $table->integer('strength');
            $table->integer('purchase_cost');
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

        Schema::table('orders', function ($table){
            $table->string('orderAmount');
            $table->dropColumn('isActive');
            $table->dropColumn('order_placed');
        });

        Schema::drop('orderDetails');
    }
}
