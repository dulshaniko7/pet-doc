<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->unsigned()->index();
            $table->char('display_name',100);
            $table->char('registration_no',50);
            $table->char('phone',15);
            $table->string('address');
            $table->char('gender',20);

            $table->timestamps();

            $table->foreign('hospital_id')->references('hospital_id')->on('hospitals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_doctors');
    }
}
