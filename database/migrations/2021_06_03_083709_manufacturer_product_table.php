<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManufacturerProductTable extends Migration
{
    public function up()
    {
        Schema::create('manufacturer_product', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('manufacturer_id');
        });
    }

    public function down()
    {
        //
    }
}
