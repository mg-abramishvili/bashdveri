<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTypeTable extends Migration
{
    public function up()
    {
        Schema::create('product_type', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('type_id');
        });
    }

    public function down()
    {
        //
    }
}
