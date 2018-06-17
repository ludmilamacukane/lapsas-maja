<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->decimal('price');
            $table->timestamps();
        });

        Schema::table('product_orders', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('product_id_foreign');
            $table->dropColumn('product_id');
            $table->dropForeign('order_id_foreign');
            $table->dropColumn('order_id');
        });

        Schema::dropIfExists('product_orders');
    }
}
