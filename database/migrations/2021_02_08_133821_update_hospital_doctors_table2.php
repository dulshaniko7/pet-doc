<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHospitalDoctorsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospital_doctors', function (Blueprint $table) {
            $table->text('about')->nullable();
            $table->bigInteger('bank_account')->nullable();
            $table->string('branch')->nullable();
            $table->text('specialization')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_doctors', function (Blueprint $table) {
            //
        });
    }
}
