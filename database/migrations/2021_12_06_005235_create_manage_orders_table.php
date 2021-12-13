<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_orders', function (Blueprint $table) {
            $table->increments('ManageOrd_id');
            $table->string('User_id');
            $table->integer('Product_id');
            $table->integer('Order_id');
            $table->integer('Quantity');
            $table->float('Amount');
            $table->float('Total_amount');
            $table->string('Date_Time');
            $table->string('Status');
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
        Schema::dropIfExists('manage_orders');
    }
}
