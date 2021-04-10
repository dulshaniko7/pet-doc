<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pet_owner_id')->unsigned()->index();
            $table->integer('pet_type')->unsigned()->index();

            $table->float('height');
            $table->float('weight');
            $table->integer('age');
            $table->char('breed',50);
            $table->date('birth_day');
            $table->char('blood_group',10);
            $table->char('colour',30);
            $table->string('image')->nullable();
            $table->text('note')->nullable();

            $table->timestamps();

            $table->foreign('pet_owner_id')->references('pet_owner_id')->on('pet_owners')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pet_type')->references('id')->on('pet_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
