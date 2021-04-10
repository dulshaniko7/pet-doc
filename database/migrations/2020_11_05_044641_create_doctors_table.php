<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->integer('doctor_id')->unsigned()->index();

            $table->string('display_name')->nullable();
            $table->String('registration_no')->nullable();
            $table->string('clinic_address')->nullable();
            $table->string('petdoc_id')->nullable();
            $table->double('rate')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
