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
        Schema::create('instruction_images', function (Blueprint $table) {
            $table->id();
            $table->string('path',256);
            $table->unsignedInteger('numberofinfo')->nullable();
            $table->unsignedBigInteger('instructionid')->index();
            $table->foreign('instructionid')->references('id')->on('instructions')->onDelete('cascade');
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
        Schema::dropIfExists('instruction_images');
    }
};
