<?php

use App\Enums\CurrencyType;
use App\Enums\PaymentType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_data', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pet_owner_id')->unsigned()->index();

            $table->string('payment_id',100)->unique();
            $table->string('customer_token',100);
            $table->string('card_holder_name',100)->nullable();
            $table->string('card_no',30)->nullable();
            $table->string('card_expiry',10)->nullable();

            $table->enum('currency', CurrencyType::getValues());
            $table->enum('payment_method', PaymentType::getValues());

            $table->timestamps();

            $table->foreign('pet_owner_id')->references('pet_owner_id')->on('pet_owners')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_data');
    }
}
