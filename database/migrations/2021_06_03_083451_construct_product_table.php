<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConstructProductTable extends Migration
{
    public function up()
    {
        Schema::create('construct_product', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('construct_id');
        });
    }

    public function down()
    {
        //
    }
}
