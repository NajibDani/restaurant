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
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->unsignedBigInteger('id_role');
            $table->timestamps();

            $table->foreign('id_role')->references('id_role')->on('tbl_roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_users');
    }
};