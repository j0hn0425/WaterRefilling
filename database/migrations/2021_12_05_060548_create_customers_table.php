<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('Cus_id');
            $table->string('Cus_Fname');
            $table->string('Cus_Lname');
            $table->string('Cus_Address');
            $table->string('Cus_ContactNo');
            $table->string('Email');
            $table->string('Password');
            $table->string('Username');
            $table->string('user_type')->default('user');
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
        Schema::dropIfExists('customers');
    }
}
