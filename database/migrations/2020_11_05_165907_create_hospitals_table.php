<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->unsigned()->index();
            $table->string('display_name')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('petdoc_id')->nullable();
            $table->double('rate')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();

            $table->foreign('hospital_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
}
