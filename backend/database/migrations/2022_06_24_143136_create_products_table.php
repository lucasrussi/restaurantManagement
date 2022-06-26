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
            $table->id();
            $table->char('product_name',100);
            $table->float('product_price',8,2);
            $table->longText('product_desc');
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
        //remove constrains balance table
        Schema::table('balances', function (Blueprint $table){
            $table->dropForeign('balances_product_id_foreign');
            $table->dropColumn('product_id');
        });

        //remove constrains categories table
        Schema::table('categories', function (Blueprint $table){
            $table->dropForeign('categories_product_id_foreign');
            $table->dropColumn('product_id');
        });

        //remove constrains balance table
        Schema::table('stores', function (Blueprint $table){
            $table->dropForeign('stores_product_id_foreign');
            $table->dropColumn('product_id');
        });

        Schema::dropIfExists('products');
    }
}
