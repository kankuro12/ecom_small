<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('logo');
            $table->text('short_detail');
            $table->text('phone');
            $table->text('clearance');
            $table->text('product_top');
            $table->text('product_bottom');
            $table->text('copyrights');
            $table->text('email');
            $table->text('address');
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
        Schema::dropIfExists('homeinfos');
    }
}
