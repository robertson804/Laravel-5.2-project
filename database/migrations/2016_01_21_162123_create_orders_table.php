<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            //First step
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('cost');
            $table->string('status');
            //Second Step
            $table->string('shipping_method');
            $table->string('shipping_provider');
            $table->string('tracking_code');
            $table->string('consolidated_image');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('packages', function ($table) {
            $table->integer('order_id')->unsigned()->nullable();

            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');

        Schema::table('packages', function (Blueprint $table) {
            $table->dropForeign('order_id');
            $table->dropColumn('order_id');
        });
    }
}
