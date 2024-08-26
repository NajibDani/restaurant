<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->id('id_order');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_category_order');
            $table->string('name_customer');
            $table->string('phone_customer');
            $table->text('address_customer');
            $table->integer('cty_menu');
            $table->string('status_order');
            $table->string('status_payment');
            $table->integer('total_price');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('tbl_users')->onDelete('cascade');
            $table->foreign('id_menu')->references('id_menu')->on('tbl_menus')->onDelete('cascade');
            $table->foreign('id_category_order')->references('id_category_order')->on('tbl_category_order')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_order');
    }
};