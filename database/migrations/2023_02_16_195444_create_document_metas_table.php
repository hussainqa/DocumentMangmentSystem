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
        Schema::create('document_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('meta_id');
            $table->string('info_1')->nullable();
            $table->string('info_2')->nullable();
            $table->string('info_3')->nullable();
            $table->string('info_4')->nullable();
            $table->string('info_5')->nullable();
            $table->string('info_6')->nullable();
            $table->string('info_7')->nullable();
            $table->string('info_8')->nullable();


            $table->timestamps();
            $table->foreign('document_id')->references('id')->on('document');
            $table->foreign('meta_id')->references('id')->on('meta');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_meta');
    }
};
