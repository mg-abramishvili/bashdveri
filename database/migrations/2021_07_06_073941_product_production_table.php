<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductProductionTable extends Migration
{
    public function up()
    {
        Schema::create('product_production', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('production_id');
        });
    }

    public function down()
    {
        //
    }
}
