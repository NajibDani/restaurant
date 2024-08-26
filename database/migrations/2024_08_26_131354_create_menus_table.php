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
        Schema::create('tbl_menus', function (Blueprint $table) {
            $table->id('id_menu');
            $table->string('name_menu');
            $table->string('category_menu');
            $table->integer('rate_menu');
            $table->text('desc_menu');
            $table->integer('price_menu');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_menus');
    }
};