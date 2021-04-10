<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalDoctorExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_doctor_exceptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_doctor_id')->unsigned()->index();
            $table->timestamp('date')->nullable();
            $table->time('time_from',0);
            $table->time('time_to',0);
            $table->timestamps();
            $table->foreign('hospital_doctor_id')->references('id')->on('hospital_doctors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_doctor_exceptions');
    }
}
