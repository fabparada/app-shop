<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
     public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->increments('id');
            //FK header
            $table->bigInteger('cart_id')->unsigned()->index();
            $table->foreign('cart_id')->references('id')->on('carts');

            //FK product
            $table->bigInteger('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('quantity');
            $table->integer('discount')->default(0); // int


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
     
      Schema::dropIfExists('cart_details');
    }
}
