<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pets',function (Blueprint $table){
            $table->string('name',100)->nullable(false)->change();
            $table->float('height')->nullable()->change();
            $table->float('weight')->nullable()->change();
            $table->string('breed',50)->nullable()->change();
            $table->date('birth_day')->nullable()->change();
            $table->string('blood_group',10)->nullable()->change();
            $table->string('colour',30)->nullable()->change();
            $table->string('breed',50)->nullable()->change();
            $table->string('gender',10)->nullable();

            $table->dropColumn('age');
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
