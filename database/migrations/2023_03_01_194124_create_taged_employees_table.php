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
        Schema::create('taged_employee', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('employee_id');


            $table->timestamps();
            $table->foreign('document_id')->references('id')->on('document');
            $table->foreign('employee_id')->references('id')->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taged_employee');
    }
};
