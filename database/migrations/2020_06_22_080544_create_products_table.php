<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->text('name');
            $table->text('tag');
            $table->decimal('price',18,2);
            $table->decimal('sales_price',18,2);
            $table->text('code');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('onsale')->nullable()->default(0);
            $table->tinyInteger('promo')->nullable()->default(0);
            $table->text('detail');
            $table->text('short_detail');
            $table->text('feature_image');
            $table->unsignedBigInteger('brand_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned();
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
