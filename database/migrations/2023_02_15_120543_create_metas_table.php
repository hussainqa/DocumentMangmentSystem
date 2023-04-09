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
        Schema::create('meta', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('info_1')->nullable();
            $table->string('info_2')->nullable();
            $table->string('info_3')->nullable();
            $table->string('info_4')->nullable();
            $table->string('info_5')->nullable();
            $table->string('info_6')->nullable();
            $table->string('info_7')->nullable();
            $table->string('info_8')->nullable();

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
        Schema::dropIfExists('meta');
    }
};
