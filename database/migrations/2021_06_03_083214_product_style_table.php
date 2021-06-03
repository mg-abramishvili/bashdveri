<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductStyleTable extends Migration
{
    public function up()
    {
        Schema::create('product_style', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('style_id');
        });
    }

    public function down()
    {
        //
    }
}
