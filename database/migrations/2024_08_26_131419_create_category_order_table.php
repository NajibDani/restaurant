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
        Schema::create('tbl_category_order', function (Blueprint $table) {
            $table->id('id_category_order');
            $table->string('category_order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_category_order');
    }
};