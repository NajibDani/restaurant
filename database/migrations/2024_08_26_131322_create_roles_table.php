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
        Schema::create('tbl_roles', function (Blueprint $table) {
            $table->id('id_role');
            $table->string('role_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_roles');
    }
};