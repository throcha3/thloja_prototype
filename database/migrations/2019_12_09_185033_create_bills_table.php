<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type'); //1 to receive 2 to pay

            $table->string('doc',100); //Document id
            $table->string('doc_type',100); //What kind of document id? order? nota fiscal?
            $table->string('installments',100); //Parcelas

            $table->date("due");
            $table->date("payment")->nullable();

            $table->text('observations',100); //Parcelas

            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('payment_id')->unsigned();

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
        Schema::dropIfExists('bills');
    }
}

