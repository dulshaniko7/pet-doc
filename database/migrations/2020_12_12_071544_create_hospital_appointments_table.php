<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pet_id')->unsigned()->index();
            $table->integer('hospital_id')->unsigned()->index();
            $table->integer('doctor_id')->unsigned()->index();
            $table->integer('pet_owner_id')->unsigned()->index();
            $table->integer('status_id')->unsigned()->index();
            $table->string('address');
            $table->text('note')->nullable();
            $table->dateTime('appointment_time');

            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('hospital_doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hospital_id')->references('hospital_id')->on('hospitals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pet_owner_id')->references('pet_owner_id')->on('pet_owners')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('appointment_status')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('hospital_appointments');
    }
}
