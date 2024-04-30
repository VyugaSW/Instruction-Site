<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login',64);
            $table->string('password',256);
            $table->string('email',128);
            $table->string('avatar',256);
            $table->unsignedBigInteger('roleid')->index();           
            $table->foreign('roleid')->references('id')->on('roles')->onDelete('cascade');
            $table->unsignedBigInteger('blockstatusid')->index();         
            $table->foreign('blockstatusid')->references('id')->on('block_statuses')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
};
