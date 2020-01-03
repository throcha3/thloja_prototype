<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_supply');
            $table->string('first_name', 50);
            $table->string('last_name', 100);
            $table->string('cpf', 11)->nullable();
            $table->string('rg', 11)->nullable();
            $table->date('birthday')->nullable();
            $table->string('adress_1', 150)->nullable(); //Rua
            $table->string('adress_2', 150)->nullable();  //Bairro
            $table->string('adress_number', 8)->nullable();
            $table->string('adress_complement', 50)->nullable();
            $table->string('city')->nullable();
            $table->string('phone_1', 15 )->nullable();
            $table->string('phone_2', 15 )->nullable();
            $table->text('obs' )->nullable();
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
        Schema::dropIfExists('customers');
    }
}
