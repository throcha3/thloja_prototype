<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('description', 100);
            $table->string('description_2', 100);

            $table->string('supplier', 100);

            $table->string('photo_url', 100);

            $table->decimal('current_amount', 12,2);
            $table->decimal('price', 12,2);
            $table->decimal('cost_price', 12,2);

            
            //Atrelar a subcategoria
            $table->bigInteger('subcategory_id')->unsigned();

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
        Schema::dropIfExists('products');
    }
}
