<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePetOwnersTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pet_owners', function (Blueprint $table) {
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('address',200)->nullable();
            $table->string('city',100)->nullable();
            $table->string('image',150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
