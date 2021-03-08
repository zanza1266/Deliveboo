<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->boolean('payment')->default(0);
            $table->mediumText('information')->nullable(true);
            $table->string('address', 100);
            $table->string('name', 20);
            $table->string('surname', 20);
            $table->string('email', 50)->unique();
            $table->string('phone', 20);
            $table->dateTime('date_order');
            $table->dateTime('scheduled_delivery')->nullable(true);  //nullable da vedere
            $table->integer('minutes_delivered')->nullable(true);
            $table->double('total_price', 7, 2);
            $table->integer('total_dishes')->nullable(true);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
