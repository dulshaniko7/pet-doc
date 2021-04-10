<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->unsigned()->index();
            $table->integer('hospital_doctor_id')->unsigned()->index();
            $table->float('charge')->nullable();
            $table->integer('commission_id')->unsigned()->index();
            $table->integer('appointment_id')->unsigned()->index();
            $table->integer('pet_owner_id')->unsigned()->index();
            $table->foreign('hospital_id')->references('hospital_id')->on('hospitals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hospital_doctor_id')->references('id')->on('hospital_doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('commission_id')->references('id')->on('commissions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('appointment_id')->references('id')->on('hospital_appointments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pet_owner_id')->references('pet_owner_id')->on('pet_owners')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hospital_payments');
    }
}
