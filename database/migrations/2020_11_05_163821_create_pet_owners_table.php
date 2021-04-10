<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pet_owner_id')->unsigned()->index();
            $table->string('display_name')->nullable();
            $table->string('gender')->nullable();
            $table->integer('telephone')->nullable();

            $table->timestamps();

            $table->foreign('pet_owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_owners');
    }
}
