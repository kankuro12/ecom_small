<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->text('product_name');
            $table->text('product_image');
            $table->text('product_code');
            $table->integer('color_id')->nullable();
            $table->text('color_name')->nullable();
            $table->integer('size_id')->nullable();
            $table->text('size_name')->nullable();
            $table->decimal('price',10,2);
            $table->integer('qty');
            $table->text('user_email');
            $table->text('session_id');
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
        Schema::dropIfExists('carts');
    }
}
